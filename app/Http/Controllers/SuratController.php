<?php

namespace App\Http\Controllers;
use App\Models\Surat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class SuratController extends Controller
{
    public function search(Request $request)
    {   
        if ($request->ajax()) {
            // Mengambil dari NoSurat dan Bulan tapi dalam B.Ing
            $surat = Surat::where('NoSurat', 'like', '%' . $request->search . '%')
            ->orwhere('TanggalBuat','like', '%'.$request->search.'%')
            ->orWhere(function ($query) use ($request) {
                $query->whereRaw("MONTHNAME(updated_at) LIKE '%" . $request . "%'");
            })
            ->get();
            $output = '';

            if (count($surat) > 0) {
                $output .= '
                    <table class="table" border="1">
                    ';
                // Format yg di tampilkan
                foreach ($surat as $s) {
                    $output .= '
                        <tr>
                            <td>' . $s->NoSurat . '</td>
                            <td>' . $s->Dasar . '</td>
                            <td>'. Carbon::parse($s->TanggalBuat)->isoFormat('D MMMM Y') .'</td>
                        </tr>
                    ';
                }
                $output .= '</table>';
            } else {
                $output .= 'No results';
            }
            return $output;
        }
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $surat = Surat::where('NoSurat','LIKE','%'.$search.'%')
        ->orWhere(function ($query) use($search) {
            $query->whereRaw("MONTHNAME(TanggalBuat) LIKE '%" . $search . "%'");
        })
        // Table yg di tampilkan sesuai tanggal kapan di buat
        ->orderBy('TanggalBuat', 'asc')
        ->paginate(5);
        return view('surat.beranda', compact(['surat']));
    }

    public function cetak_pdf($id, User $user)
    {
        // Controller untuk lihat surat 
        $surat = Surat::whereIn('id', explode(',', $id))->get();
        $user = $user->find(auth()->user()->id);
        if($surat->isEmpty()){
            return redirect('beranda')->with('error','Surat Tidak Ada');
        }
        $pdf = PDF::loadview('show_pdf', compact('surat', 'user'));
        return $pdf->stream('SurTug.pdf');
    }

    public function download_pdf($id, User $user)
    {
        // Controller untuk download surat
        $surat = Surat::whereIn('id', explode(',', $id))->get();
        $user = $user->find(auth()->user()->id);
        if($surat->isEmpty()){
            return redirect('beranda')->with('error','Surat Tidak Ada');
        }
        $pdf = PDF::loadview('show_pdf', compact('surat', 'user'));
        return $pdf->download('SurTug.pdf');
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        // Jika No Surat sudah ada maka akan terjadi error alert
        $request->validate([
            'NoSurat' => [
                'required',
                Rule::unique('inputsurat')->where(function ($query) {
                    return $query->where('NoSurat', request('NoSurat'));
                }),
            ],
        ]);
        Surat::create($request->except(['_token','submit']));
        return redirect('/beranda');
    }

    public function edit($id)
    {
        $surat = Surat::find($id);
        return view('surat.edit', compact(['surat']));
    }

    public function update($id, Request $request)
    {
        // Jika No Surat sudah ada maka akan terjadi error alert
        $surat = Surat::find($id);
        $request->validate([
            'NoSurat' => [
                'required',
                Rule::unique('inputsurat')->where(function ($query) {
                    return $query->where('NoSurat', request('NoSurat'));
                }),
            ],
        ]);
        $surat->update($request->except(['_token','submit']));
        return redirect('/beranda');
    }

    public function delete($id)
    {
        // Diarahkan ke halaman delete sebelum menghapus surat
        $surat = Surat::find($id);
        return view('surat.delete', ['surat' => $surat]);
    }

    public function destroy($id)
    {
        $surat = Surat::find($id);
        $surat->delete();
        return redirect('/beranda');
    }

    public function riwayat(Request $request)
    {
        if($request->has('bulan') && $request->has('tahun')) {
            $selectedMonth = $request->bulan;
            $selectedYear = $request->tahun;
            $data = Surat::WhereYear('TanggalBuat', $selectedYear)
                ->whereMonth('TanggalBuat', Carbon::parse($selectedMonth)->month)
                ->orderBy('TanggalBuat', 'DESC')
                ->paginate(5)->withQueryString();
            return view('surat.riwayat', compact('data'));
        } elseif($request->has('bulan')) {
            // Jika hanya bulan yang dipilih, ambil semua tahun untuk bulan tersebut
            $selectedMonth = $request->bulan;
            $data = Surat::whereMonth('TanggalBuat', Carbon::parse($selectedMonth)->month)
                ->orderBy('TanggalBuat', 'DESC')
                ->paginate(5)->withQueryString();
            return view('surat.riwayat', compact('data'));
        } elseif ($request->has('tahun')) {
            // Jika hanya tahun yang dipilih, ambil semua bulan untuk tahun tersebut
            $selectedYear = $request->tahun;
            $data = Surat::whereYear('TanggalBuat', $selectedYear)
                ->orderBy('TanggalBuat', 'DESC')
                ->paginate(5)->withQueryString();
            return view('surat.riwayat', compact('data'));    
        } elseif($request->has('tanggalbulantahun')) {
            $selectedDate = $request->tanggalbulantahun;
            $data = Surat::whereDate('TanggalBuat', '=', $selectedDate)
                            ->orderBy('TanggalBuat', 'DESC')
                            ->paginate(5)->withQueryString();
            return view('surat.riwayat', compact('data'));
        } else {
            // Mengambil data dari database, diurutkan berdasarkan tanggal
            $letters = Surat::orderBy('TanggalBuat', 'DESC')
                ->paginate(5);
            return view('surat.riwayat', compact('letters'));
        }
    }

}
