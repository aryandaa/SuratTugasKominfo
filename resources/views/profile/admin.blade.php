@extends('template.layout')

@section('content')
    {{-- Profile --}}
    <div class="ml-20 p-4 my-5"> 
        <div class="bg-white p-8 rounded shadow-md w-[800px] h-104 border-t-4 border-blue-600">
            <a href="/beranda" class="flex items-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
            <h1 class="text-2xl pl-5 font-bold">Profil Saya</h1>
            <hr class="mt-1 border-1/2 border-blue-400">
            <div class="pl-5 grid grid-cols-2 gap-3">
                <div class="mt-1 flex">
                    <label for="name" class="font-bold pr-2">Nama:</label>
                    <p id="name" class="capitalize">{{Auth::user()->name}}</p>
                </div>
                <div class="mt-1 flex">
                    <label for="name" class="font-bold pr-2">NIP:</label>
                    <p id="name" class="capitalize">{{Auth::user()->NIP}}</p>
                </div>
                <div class="">
                    <label for="rank" class="font-bold">Pangkat:</label>
                    <p id="rank" class="uppercase">{{Auth::user()->pangkat}}</p>
                </div>
                <div class="">
                    <label for="position" class="font-bold">Jabatan:</label>
                    <p id="position" class="uppercase">{{Auth::user()->jabatan}}</p>
                </div>
            </div>
        </div>

        {{-- Profile Admin --}}
        @if(Auth::user()->role == 'admin')
        <div class="bg-white mt-10 rounded p-8 shadow-md w-[800px] border-t-4 border-green-600">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold my-5">Pegawai:</h2>
                <a href="/admin/create">
                <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Tambah</button>
                </a>
            </div>
            <div class="max-h-64 overflow-y-auto">
                @foreach ($User as $u)
                <hr class="my-2 border-1/2 border-black">
                <div class="flex justify-between">
                    <div class="pl-5">
                        <p>{{$u -> name}}</p>
                    </div>
                    <div class="flex pr-5">
                        <a href="/admin/{{$u->id}}/view" class="bg-blue-500 text-white py-1 px-2 rounded mr-2 hover:bg-blue-600">Lihat</a>
                        <a href="/admin/{{$u->id}}/delete" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Hapus</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <script type="text/javascript">
            $(function (){
                $(document).on('click','#delete', function(e){
                    e.preventDefault();
                    var link = $(this).attr("button")

                    Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                        });
                    }
                    });
                })
            })
        </script>
        @endif
@endsection