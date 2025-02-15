<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Surat-Digital</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
     <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .upgrade-btn { background: #1947ee; }
    </style>

</head>
<body class="bg-white font-family-karla">

    <nav class="fixed z-50 w-full h-18 border-b border-blue-950 bg-blue-950">
		<div class="p-3">
			<div class="flex items-center justify-between">
				<div class="flex items-center justify-start ml-3">
					<a href="">
						<img src="/images/logokominfo.png" class="w-50 h-12 ml-2">
					</a>
                    <form action="{{ url('/beranda') }}" method="get" class="ml-36">
                        <div class="flex">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No Surat" autocomplete="off"  class="form-control block w-[600px] px-3 py-2 text-white-700 bg-white border rounded-l focus:border-sky-600 focus:ring-blue-300 focus:outline-none focus:ring-opacity-30">
                            <button type="submit" class="px-3 py-3 font-medium text-white bg-blue-500 hover:bg-blue-600 mr-4 rounded-r">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </div>
                    </form>
				</div>
                

				<div class="flex items-center">
                    <div class="flex items-center mr-5">
                        <button type="button" class="text-white inline-flex items-center font-medium justify-center px-4 py-1 text-sm rounded-lg cursor-pointer hover:bg-blue-900" data-dropdown-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 p-2 bg-blue-500 rounded-full mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            {{(Auth::user()->name)}}
                        </button>
                    </div>
                    <div class="text-white z-10 w-32 hidden text-center my-4 list-none bg-blue-500 mr-4 rounded" id="dropdown">
                        <u class="py-3" role="none" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <div class="px-4 pt-3 pb-2 text-sm capitalize" role="menuitem">
                                    {{(Auth::user()->role)}}
                                </div>
                            </li>
                            <li>
                                <a href="/profile/admin" class="block px-4 pt-3 pb-2 text-sm hover:bg-blue-600" role="menuitem">Profile</a>
                            </li>
                            <li>
                                <a href="/logout" class="block px-4 pb-3 pt-2 text-sm hover:bg-blue-600 rounded-b" role="menuitem">Logout</a>
                            </li>
                        </u>
                    </div>
				</div>
			</div>
		</div>
	</nav>    

	<aside class="fixed top-0 left-0 w-64 h-screen pt-20 bg-blue-950">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-blue-950">
            <ul class="space-y-2">
                <li>
                    <a href="/beranda" class="text-xl text-white flex items-center p-5 rounded-lg hover:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mr-1 w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                          </svg>                          
                        <span class="ml-3">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/surat/create" class="text-xl text-white flex items-center p-5 rounded-lg hover:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mr-1 w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>                          
                        <span class="ml-3">Buat Surat</span>
                    </a>
                </li>
                <li>
                    <a href="/surat/riwayat" class="text-xl text-white flex items-center p-5 rounded-lg hover:bg-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mr-1 w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                          </svg>                          
                        <span class="ml-3">Riwayat Surat</span>
                    </a>
                </li>
            </ul>
        </div>
	</aside>

    <main class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20">
        @yield('content')
        </div>
    </main>

{{-- cdn jquery --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
{{-- cdn flowbite  --}}
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
{{-- enx cdn flowbite --}}
</body>
</html>