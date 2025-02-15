@extends('template.layout')

@section('content')
{{-- Halaman Utama --}}
<h1 class="font-bold text-3xl pb-10">Riwayat Surat Tugas</h1>
<div>
    <form action="/surat/riwayat" class="flex">
        {{-- Fitur filter bulan --}}
        <select name="bulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-32 p-2.5">
            @if (empty(request('bulan')))
                <option value="" selected disabled hidden>Pilih Bulan</option>
            @else
                <option value="{{ request('bulan') }}" selected disabled hidden>{{ request('bulan') }}</option>
            @endif
            {{-- Pemilihan bulan --}}
            <option value="January">Januari</option>
            <option value="February">Februari</option>
            <option value="March">Maret</option>
            <option value="April">April</option>
            <option value="May">Mei</option>
            <option value="June">Juni</option>
            <option value="July">Juli</option>
            <option value="August">Agustus</option>
            <option value="September">September</option>
            <option value="October">Oktober</option>
            <option value="November">November</option>
            <option value="December">Desember</option>
        </select>
        {{-- Fitur filter tahun --}}
        <select name="tahun" class="ms-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-32 p-2.5">
            @if (empty(request('tahun')))
                <option value="" selected disabled hidden>Pilih Tahun</option>
            @else
                <option value="{{ request('tahun') }}" selected disabled hidden>{{ request('tahun') }}</option>
            @endif
             {{-- Pemilihan tahun --}}
            @php
                $currentYear = date("Y");
                $startYear = $currentYear - 5;
                $endYear = $currentYear + 5;
            @endphp
            @for ($year = $startYear; $year <= $endYear; $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
        <input type="date" name="tanggalbulantahun" class="ms-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-32 p-2.5" value="{{ request('tanggalbulantahun') }}">
        <button type="submit" class="p-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only"></span>
        </button>
    </form>
</div>
{{-- Jika data belum dimasukan akan menampilkan semua data --}}
@if(isset($letters))
    <table class="mt-3 ml-20 border-black border-2 h-14 w-[900px]">  
        <tr class="border-b-2 border-black text-center">
            <td>Nomor Surat Tugas</td>
            <td>Tanggal Buat</td>
            <td class="pl-20">Aksi</td>
        </tr>
        @foreach ($letters as $letter)
            <tr class="border-b-2 border-black text-center">
                <td>No. {{ $letter->NoSurat }}/BPSDMP.63/KP.01.06{{date('/m/Y',strtotime($letter->TanggalBuat))}}</td>
                <td>{{ date('d-F-Y', strtotime($letter->TanggalBuat)) }}</td>
                <td class="float-right my-1 pr-10">
                    <a href="/surat/download_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 rounded-md bg-green-500">Unduh</a>
                    <a href="/surat/{{$letter->id}}/cetak_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-blue-500" target="_blank">Lihat</a>
                    <a href="/surat/{{$letter->id}}/edit" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-yellow-300">Edit</a>
                    @if(Auth::user()->role == 'admin')
                        <a href="/surat/{{$letter->id}}/delete" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-red-500">Hapus</a>
                    @endif
                </td> 
            </tr>
        @endforeach
    </table>
    <div class="mt-4 mx-10">
        {{ $letters->links() }}
    </div>
        @else
            {{-- Jika data yang dicari tidak ada maka pesan tersebut akan ditampilkan --}}
        @if ($data->isEmpty())
            <a href="/surat/riwayat" type="button" class="float-right border border-gray-300 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
            <h1 class="font-bold text-3xl pt-20 text-center">Tidak Ada Surat Di Bulan/Tahun Ini</h1>        
        @else
        <a href="/surat/riwayat" type="button" class="float-right border border-gray-300 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
        {{-- Menampilkan data yang sudah di filter berdasarkan bulan dan tahun --}}
        {{-- Tampilkan data berdasarkan tahun atau bulan --}}
            <table class="mt-3 ml-20 border-black border-2 h-14 w-[900px]">  
                <tr class="border-b-2 border-black text-center">
                    <td>Nomor Surat Tugas</td>
                    <td>Tanggal Buat</td>
                    <td class="pl-20">Aksi</td>
                </tr>
                @foreach ($data as $letter)
                    <tr class="border-b-2 border-black text-center">
                        <td>No. {{ $letter->NoSurat }}/BPSDMP.63/KP.01.06{{date('/m/Y',strtotime($letter->TanggalBuat))}}</td>
                        <td>{{ date('d-F-Y', strtotime($letter->TanggalBuat)) }}</td>
                        <td class="float-right my-1 pr-10">
                            <a href="/surat/download_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 rounded-md bg-green-500">Unduh</a>
                            <a href="/surat/{{$letter->id}}/cetak_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-blue-500" target="_blank">Lihat</a>
                            <a href="/surat/{{$letter->id}}/edit" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-yellow-300">Edit</a>
                            @if(Auth::user()->role == 'admin')
                                <a href="/surat/{{$letter->id}}/delete" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-red-500">Hapus</a>
                            @endif
                        </td> 
                    </tr>
                @endforeach
            </table>
            <div class="mt-4 mx-10">
                {{ $data->links() }}
            </div>
        @endif
    @endif
@endsection
