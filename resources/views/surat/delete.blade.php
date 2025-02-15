@extends('template.layout')

@section('content')

<h1 class="font-bold text-3xl pb-3">Hapus Data Surat</h1>
<div>
    <h3 class="font-bold text-2xl pb-3">Apa anda yakin?</h3>
    <form action="/surat/{{$surat->id}}/destroy" method="POST">
        @method('delete')
        @csrf
        <button type="submit" class="text-center mx-1 rounded-md p-2 w-16 bg-red-500">Delete</button>
        <a href="/beranda" class="text-center mx-1 rounded-md p-2 w-16 bg-blue-500">Cancel</a>
    </form>
</div>

<table class="text-xl mt-5 ml-20 border-black border-2 h-14 w-[700px]">  
    <tr class="border-b-2 border-black text-center">
       <td>Nomor Surat Tugas</td>
       <td>Tanggal Buat</td>
    </tr>
    <tr class="border-b-2 border-black text-center">
        <td>No.{{$surat->NoSurat}}/BPSDMP.63/KP.01.06{{date('/m/Y',strtotime($surat->TanggalBuat))}}</td>
        <td>{{ date('d-F-Y', strtotime($surat->TanggalBuat)) }}</td>
    </tr>
</table>
@endsection