<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LOG IN</title>
</head>
<body>

    <!-- component -->
<div  class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12"id="login">
  <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
    <div class="flex justify-center mb-6">
            <span class="inline-block bg-gray-200 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
            </span>
        </div>
    
    <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">

        <form class="px-5 py-7" action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-5 flex flex-col">
                <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                <input id="email" type="text" name="email" class="border rounded-lg px-3 py-2 mt-1  text-sm w-full" placeholder="entre email"/>
                <span id="emailError" class="text-red-500 ">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
            </div>

           <div class="mb-5 flex flex-col">
                <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                <input id="password" type="text" name="password" class="border rounded-lg px-3 py-2 mt-1  text-sm w-full"  placeholder="••••••••" />
                <span id="passwordError" class="text-red-500 ">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group form-check pb-3 flex justify-between">
                <div class="">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <a href="{{route('enter.email')}}" class="form-check-label text-blue-600" for="remember">Forget Password</a>
            </div>
            <button type="submit" name="send" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                log in
            </button>

        </form>

        

        <div class="py-5 flex justify-end">
            <div class="flex justify-end">
              <div class="text-center sm:text-right  whitespace-nowrap">
                {{-- <a href="{{route('')}}" class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-blue-500  hover:bg-blue-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                    sign up
                    
                </a> --}}
              </div>
            </div>
        </div>
    </div>
    
  </div>
</div>


</body>
</html>