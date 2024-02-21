<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    




  <!-- component -->
<div>
    {{-- nav bar --}}
    <nav class="w-full border-b py-2">
      <div class="py-5 md:py-0 container mx-auto px-6 flex items-center justify-between ">
        <div aria-label="Home. logo" role="img" class=" w-10 h-10">
          <img class="md:w-auto" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/centre_aligned_simple-Svg1.svg" alt="logo" />
        </div>
        <div class="flex gap-1">

          @guest
            <a href="{{route('login')}}" class="py-2.5 px-5 me-2  text-sm font-medium text-indigo-700 focus:outline-none bg-white rounded-lg border border-blue-400 hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Sign In</a>
            <a href="{{route('register')}}" class="py-2.5 px-5 me-2  text-sm font-medium text-indigo-700 focus:outline-none bg-white rounded-lg border border-blue-400 hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Sign UP</a>
          @endguest
          
          @auth
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button type="submit" class="py-2.5 px-5 me-2  text-sm font-medium text-indigo-700 focus:outline-none bg-white rounded-lg border border-blue-400 hover:bg-blue-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Log out</button>  
            </form>
          @endauth
        </div>
      </div>
    </nav>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.414 1.414l-2.829-2.829-2.828 2.829a1 1 0 1 1-1.414-1.414l2.828-2.828-2.828-2.829a1 1 0 0 1 1.414-1.414l2.828 2.828 2.829-2.828a1 1 0 0 1 1.414 1.414l-2.829 2.829 2.829 2.828z"/></svg>
        </span>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.414 1.414l-2.829-2.829-2.828 2.829a1 1 0 1 1-1.414-1.414l2.828-2.828-2.828-2.829a1 1 0 0 1 1.414-1.414l2.828 2.828 2.829-2.828a1 1 0 0 1 1.414 1.414l-2.829 2.829 2.829 2.828z"/></svg>
        </span>
    </div>
    @endif


    <!-- landing page -->
    <div class="p-6 w-full container md:w-2/3 xl:w-auto mx-auto flex flex-col xl:items-stretch justify-between xl:flex-row">

        <div class="xl:w-1/2 md:mb-14 xl:mb-0 relative h-auto flex items-center justify-center ">
            <img src="https://cdn.tuk.dev/assets/components/26May-update/newsletter-1.png" alt="Envelope with a newsletter" role="img" class="h-full xl:w-full lg:w-1/2 w-full " />
        </div>
        <div class="w-full xl:w-1/2 xl:pl-40 xl:py-28">
            <h1 class=" p-2 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-gray-800 font-black leading-7 md:leading-10">Subscribe</h1>
            <p class="text-base leading-normal text-gray-600 text-center xl:text-left">Whether article spirits new her covered hastily sitting her. Money witty books nor son add.</p>
            
            <form class="flex items-stretch mt-12" action="{{route('subscribe')}}" method="POST">
              @csrf
                <input name="email" class="bg-gray-100 rounded-lg rounded-r-none text-base leading-none text-gray-800 p-3 w-4/5 border border-transparent focus:outline-none focus:border-gray-500" type="email" placeholder="Your Email" />
                <button class="w-32 rounded-l-none hover:bg-indigo-600 bg-indigo-700 rounded text-base font-medium leading-none text-white p-3 uppercase focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">subscribe</button>
            </form>

            <form class="flex items-stretch mt-12" action="{{route('unsubscribe')}}" method="POST">
              @csrf
                <input name="email" class="bg-gray-100 rounded-lg rounded-r-none text-base leading-none text-gray-800 p-3 w-4/5 border border-transparent focus:outline-none focus:border-gray-500" type="email" placeholder="Your Email" />
                <button class="w-32 rounded-l-none hover:bg-indigo-600 bg-indigo-700 rounded text-base font-medium leading-none text-white p-3 uppercase focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700">Unsubscribe</button>
            </form>
        </div>
    
    </div>
</div>


 


</body>
</html>