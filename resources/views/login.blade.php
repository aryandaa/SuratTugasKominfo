<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
  </head>

  <!-- background &  -->
  <body>
  <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <div class="bg-blue-300 felative flex flex-col justify-center min-h-screen overflow-hidden">
      <div class="w-full p-6 m-auto bg-white rounded-[40px] shadow-lg shadow-gray-800/50 lg:max-w-md">
      <div class="p-8 ml-[105px]">
        <img src="/images/logo kominfo.png" class="w-[125px] h-[126px]">
      </div>

        <!-- peringatan kesalahan -->
        @if($errors->any())
          <div class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert"> 
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">DANGER</span>
            <div>
            <p class="font-bold">Kesalahan</p>
              <ul class="mt-1.5 ml-4 list-disc list-inside">
                @foreach($errors->all() as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif

        <!-- isi dari card -->
        <form action="" method="POST">
          @csrf
          <div class="mt-4">
            <label for="NIP" class="block font-semibold text-gray-700">NIP</label>
            <input type="text" value="{{ old('NIP') }}" name="NIP" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring-opacity-40 text-xl font-family" placeholder="Masukkan NIP...">
          </div>

            <!-- visable password -->
            <div class="mt-4">
              <div class="relative" x-data="{ isVisible: false }">
                    <div class="absolute flex right-4 mt-1.5 items-center ml-2 h-full mt-4">
                      <button class="px-1 block focus:outline-none" @click="$dispatch('visibility'); isVisible = !isVisible;">
                        <div x-show="isVisible">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                          </svg>
                        </div>
                        <div x-show="!isVisible">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                            </path>
                          </svg>
                        </div>
                      </button>
                    </div>
                    <label for="password" class="block font-semibold text-gray-800">
                      <span
                        class="font-medium m-2 text-gray-700 after:content-['*'] after:ml-0.5 after:text-red-500">Password</span>
                      <input type="password" name="password" id="password" placeholder="Masukkan Password" minlength="5"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring-opacity-40 text-xl font-family first-letter:invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 invalid:focus:bg-pink-100 peer"
                        @visibility.window="$el.type = ($el.type == 'password') ? 'text' : 'password' ">
                    </label>
                  </div>
                </div>
                <div>
                  <button name="submit" type="submit" class="w-full px-4 py-2 mt-5 tracking-wide text-white transition-colors duration-200 transfrom bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Login</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </body>
</html>
