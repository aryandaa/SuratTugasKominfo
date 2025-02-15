@extends('template.layout')

@section('content')
    <div class="ml-20 p-4 my-5">
            <div class="bg-white p-8 rounded shadow-md w-[800px] h-104 border-t-4 border-blue-600">
                <a href="/profile/admin" class="flex items-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
                <h1 class="text-2xl pl-5 font-bold">Profil Pegawai</h1>
                <hr class="mt-1 border-1/2 border-blue-400">
                <div class="pl-5 grid grid-cols-2 gap-3">
                    <div class="mt-1 flex">
                        <label for="name" class="font-bold pr-2">Nama:</label>
                        <p id="name" class="capitalize">{{$view->name}}</p>
                    </div>
                    <div class="mt-1 flex">
                        <label for="name" class="font-bold pr-2">NIP:</label>
                        <p id="name" class="capitalize">{{$view->NIP}}</p>
                    </div>
                    <div class="">
                        <label for="rank" class="font-bold">Pangkat:</label>
                        <p id="rank" class="uppercase">{{$view->pangkat}}</p>
                    </div>
                    <div class="">
                        <label for="position" class="font-bold">Jabatan:</label>
                        <p id="position" class="uppercase">{{$view->jabatan}}</p>
                    </div>
                </div>
                <button class="bg-green-400 text-white px-5 py-2 mt-5 ml-3 rounded hover:bg-green-600">
                        <a href="/admin/{{$view->id}}/ubah">Ubah</a>
                </button>
                </div>
            </div>
        </div>
@endsection
