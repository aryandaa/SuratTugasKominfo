@extends('template.layout')

@section('content')

<h1 class="font-bold text-3xl pb-5">Edit Surat</h1>

<div class="p-4 ml-3 border border-3 bg-gray-200 rounded w-[1000px]">
    <form action="/surat/{{$surat->id}}" method="POST">
    @method('put')
        @csrf
        <div class="grid grid-cols-7 flex">
            <p class="text-xl mt-2">Nomor Surat :</p> {{--Cara munculkan peringatan jika error --}}
                <input type="text" name="NoSurat" value="{{$surat->NoSurat}}" placeholder="cth. : 148/BPSDMP.63/KP.01.06" class="rounded mt-2 mr-2 h-[40px] w-[250px] col-span-2">
            <p class="text-xl mt-2">Tanggal Buat :</p>
                <input type="date" name="TanggalBuat" value="{{$surat->TanggalBuat}}" placeholder="Tanggal Buat" class="rounded ml-2 mt-2 h-[40px] w-[170px] col-span-2">
            <div></div>
            {{--  --}}
            <p class="text-xl py-2 flex mr-2">Menimbang :</p>
                <textarea type="text" name="Menimbang" placeholder="Contoh : bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023;" cols="70" rows="4" class="mt-3 rounded col-span-5 resize-none">{{$surat->Menimbang}}</textarea>
            <div></div>
            {{--  --}}
            <p class="text-xl py-2 mr-2">Dasar :</p>
                <textarea type="text" name="Dasar" placeholder="Contoh : Peraturan Menteri Komunikasi dan Informatika Nomor 3 Tahun 2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis Bidang Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika." cols="70" rows="4" class="mt-3 rounded col-span-4 resize-none">{{$surat->Dasar}}</textarea>
            <div></div>
            <div></div>
            {{--  --}}
            <p class="text-xl py-2 mr-2">Untuk :</p>
                <textarea type="text" name="Untuk" placeholder="Contoh : Biaya yang timbul akibat pelaksanaan kegiatan tersebut di atas dibebankan pada DIPA BPSDMP KOMINFO Banjarmasin No. SP DIPA-059.06.2.432696/2023 Tanggal 30 November 2022." cols="70" rows="4" class="mt-3 rounded col-span-4 resize-none">{{$surat->Untuk}}</textarea>
            <div></div>
            <div></div>
            {{--  --}}
            <p class="text-lg py-4 mr-2">Dari Tanggal :</p>
                <input type="date" name="DariTanggal" value="{{$surat->DariTanggal}}" placeholder="Dari Tanggal" class="col-span-2 mt-3 rounded h-[40px] w-[200px]">
            <p class="text-md py-5">Sampai Tanggal :</p>
                <input type="date" name="SampaiTanggal" value="{{$surat->SampaiTanggal}}" placeholder="Sampai Tanggal" class="col-span-2 mt-3 rounded h-[40px] w-[170px]">
            <div></div>
            {{--  --}}
            {{-- <p class="text-lg py-2 mr-2">Tanggal Tugas :</p>
            <input type="date"name="TanggalTugas" placeholder="Tanggal Tugas" class="mt-3 rounded h-[40px] w-[170px] col-span-2"> --}}
            <div></div>
                <select id="Provinsi" name="Provinsi" class="pl-2 mt-3 rounded col-span-2 h-[40px] w-[200px]" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="Kalimantan Selatan" @if($surat->Provinsi == "Kalimantan Selatan") selected @endif>Kalimantan Selatan</option>
                    <option value="Kalimantan Timur" @if($surat->Provinsi == "Kalimantan Timur") selected @endif>Kalimantan Timur</option>
                    <option value="Kalimantan Barat" @if($surat->Provinsi == "Kalimantan Barat") selected @endif>Kalimantan Barat</option>
                    <option value="Kalimantan Tengah" @if($surat->Provinsi == "Kalimantan Tengah") selected @endif>Kalimantan Tengah</option>
                    <option value="Kalimantan Utara" @if($surat->Provinsi == "Kalimantan Utara") selected @endif>Kalimantan Utara</option>
                </select>
                <select id="KabKota" name="KabKota" class="pl-2 mt-3 rounded col-span-2 h-[40px] w-[220px]" required>
                    <option value=""><p class="text-blue-400">Pilih Kabupaten/Kota</p></option>
                    <option value="Banjarbaru" @if($surat->KabKota == "Banjarbaru") selected @endif>Banjarbaru</option>
                    <option value="Samarinda" @if($surat->KabKota == "Samarinda") selected @endif>Samarinda</option>
                    <option value="Palangkaraya" @if($surat->KabKota == "Palangkaraya") selected @endif>Palangkaraya</option>
                    <option value="Pontianak" @if($surat->KabKota == "Pontianak") selected @endif>Pontianak</option>
                    <option value="Tanjung Selor" @if($surat->KabKota == "Tanjung Selor") selected @endif>Tanjung Selor</option>
                </select>
            <div></div>
            <div></div>
            <div></div>
            <div class="flex mt-3">
              <button class="text-center py-2 px-2 rounded-md my-2 mr-3 w-30 bg-green-500">
                <input type="submit" name="submit" value="Ubah">
              </button>
              <a href="/beranda" class="text-center py-2 px-2 rounded-md my-2 mr-3 w-30 bg-blue-400">Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection

{{-- <input type="text" name="Menimbang" placeholder="Menimbang"><br>

<form action="/surat/{{$surat->id}}" method="POST">
    @method('put')
    @csrf
    <input type="text" name="NoSurat" placeholder="No Surat" value="{{$surat->NoSurat}}"><br>
    <input type="date" name="BulanTahun" placeholder="Bulan Tahun" value="{{$surat->BulanTahun}}"><br>
    <textarea name="Menimbang" rows="6" placeholder="Menimbang">{{$surat->Menimbang}}</textarea><br>
    <textarea name="Dasar" rows="6" placeholder="Dasar">{{$surat->Dasar}}</textarea><br>
    <textarea name="Untuk" rows="6" placeholder="Untuk">{{$surat->Untuk}}</textarea><br>
    <select name="KabKota">
        <option value="">Kab/Kota</option>
        <option value="Banjarbaru" @if($surat->KabKota == "Banjarbaru") selected @endif>Banjarbaru</option>
        <option value="Samarinda" @if($surat->KabKota == "Samarinda") selected @endif>Samarinda</option>
        <option value="Palangkaraya" @if($surat->KabKota == "Palangkaraya") selected @endif>Palangkaraya</option>
        <option value="Pontianak" @if($surat->KabKota == "Pontianak") selected @endif>Pontianak</option>
        <option value="Tanjung Selor" @if($surat->KabKota == "Tanjung Selor") selected @endif>Tanjung Selor</option>
    </select><br>
    <select name="Provinsi">
        <option value="">Provinsi</option>
        <option value="Kalimantan Selatan" @if($surat->Provinsi == "Kalimantan Selatan") selected @endif>Kalimantan Selatan</option>
        <option value="Kalimantan Timur" @if($surat->Provinsi == "Kalimantan Timur") selected @endif>Kalimantan Timur</option>
        <option value="Kalimantan Barat" @if($surat->Provinsi == "Kalimantan Barat") selected @endif>Kalimantan Barat</option>
        <option value="Kalimantan Tengah" @if($surat->Provinsi == "Kalimantan Tengah") selected @endif>Kalimantan Tengah</option>
        <option value="Kalimantan Utara" @if($surat->Provinsi == "Kalimantan Utara") selected @endif>Kalimantan Utara</option>
    </select><br>
    <input type="date" name="TanggalTugas" placeholder="Tanggal Tugas" value="{{$surat->TanggalTugas}}"><br>
    <input type="submit" name="submit" value="Update">
    <a href="/beranda">Cancel</a>
</form> --}}