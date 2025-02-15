@extends('template.layout')

@section('content')
    <div class="ml-20 p-4 my-5"> 
        <div class="bg-white p-8 rounded shadow-md w-[800px] h-104 border-t-4 border-blue-600">
            <a href="/profile/admin" class="flex items-center bg-blue-500 text-white py-2 px-3 rounded hover:bg-blue-600 mb-4">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
            <h1 class="text-2xl font-bold">Buat Akun</h1>
            <hr class="mt-1 border-1/2 border-blue-400">
            <form action="store" method="POST">
                @csrf
                <div class="pl-5 pt-4 grid grid-cols-2 gap-3">
                    <div class="">
                        <label for="name" class="font-bold">Nama:</label>
                        <input type="text" name="name" class="capitalize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="">
                        <label for="name" class="font-bold">NIP:</label>
                        <input type="number" name="NIP" class="capitalize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @error('NIP')
                        <p class="font-bold text-red-500">NIP sudah ada</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="rank" class="font-bold">Pangkat:</label>
                        <input type="text" name="pangkat" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="">
                        <label for="position" class="font-bold">Jabatan:</label>
                        <input type="text" name="jabatan" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    
                    <div class="">
                        <label for="position" class="font-bold">Password:</label>
                        <input type="text" name="password" class="capitalize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                    <div class="">
                        <label for="position" class="font-bold">Role pengguna:</label>
                    <select name="role" class="capitalize block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option>Pilih Role</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                    </select>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div></div>
                    <input type="submit" name="submit" value="Tambahkan" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800 mt-4">
                </div>
            </form>
        </div> 
    </div>
@endsection