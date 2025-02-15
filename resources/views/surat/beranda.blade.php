@extends('template.layout')

@section('content')

<h1 class="font-bold text-3xl pb-5">Beranda</h1>

@if($surat->count() > 0)
   @if(request()->has('search'))
   <a href="/beranda" class="text-center mx-1 rounded-md p-2 w-16 rounded-md bg-blue-400">Kembali</a>
   @endif
    <table class="mt-5 ml-20 border-black border-2 h-14 w-[900px]">  
      <tr class="border-b-2 border-black text-center">
         <td>Nomor Surat Tugas</td>
         <td>Tanggal Buat</td>
         <td class="pl-20">Aksi</td>
      </tr>
      @foreach($surat as $s) 
      <tr class="border-b-2 border-black text-center">
         <td>No.{{$s->NoSurat}}/BPSDMP.63/KP.01.06{{date('/m/Y',strtotime($s->TanggalBuat))}}</td>
         <td>{{ \Carbon\Carbon::parse($s->TanggalBuat)->isoFormat('D MMMM Y') }}</td>
         <td class="float-right my-1 pr-10">
            <a href="/surat/{{$s->id}}/download_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 rounded-md bg-green-500">Unduh</a>
            <a href="/surat/{{$s->id}}/cetak_pdf" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-blue-500" target="_blank">Lihat</a>
            <a href="/surat/{{$s->id}}/edit" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-yellow-300">Edit</a>
            @if(Auth::user()->role == 'admin')
               <a href="/surat/{{$s->id}}/delete" class="float-right text-center mx-1 rounded-md p-2 w-16 bg-red-500">Hapus</a>
            @endif
        </td>
     </tr>
      @endforeach
   </table>
   <div class="mt-5 mr-10 ml-20">
      {{ $surat->links()}}
   </div>
@else 
   <a href="/beranda" class="text-center mx-1 rounded-md p-2 w-16 rounded-md bg-blue-400">Kembali</a>
   <p class="mt-20 font-bold text-3xl text-center">Tidak Ada Surat</p>
@endif

{{-- 
<tr class="border-b-2 border-black">
   <td class="font-bold">Surat</td>
   <td>
       <button class="float-right rounded-md p-2 mr-3 w-16 bg-yellow-300">Save</button>
       <button class="float-right rounded-md p-2 mr-3 w-16 bg-green-500">Show</button>
       <button class="float-right rounded-md p-2 mr-3 w-16 bg-blue-500">Edit</button>
   </td>
</tr> --}}
{{-- <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-3 gap-4 mb-4">
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div>
       
   <!-- <h1 class="text-3xl ml-10  font-bold">Januari 2023</h1> -->
<table class="mt-10 ml-10 border-black border-2 h-14 w-[1000px]">
    @foreach($surat as $s)    
    <tr class="border-b-2 border-black">
        <td class="font-bold pl-3">Surat {{ $s->NoSurat }} {{ $s->TanggalTugas }}</td>
        <td class="float-right">
            <a href="/surat/download_pdf" class="float-right text-center mx-1 rounded-md p-3 w-16 bg-yellow-300">Save</a>
            <a href="/surat/cetak_pdf" class="float-right text-center mx-1 rounded-md p-3 w-16 bg-green-500">Show</a>
            <a href="/surat/{{$s->id}}/edit" class="float-right text-center mx-1 rounded-md p-3 w-16 bg-blue-500">Edit</a>
        </td>
    </tr>
    @endforeach
</table> --}}

@endsection
