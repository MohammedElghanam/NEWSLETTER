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
 
<!-- All Page -->
<div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">

    <!-- Left menu -->
    <aside class=" flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
        <div>
            <div class="text-white">
                <div class="flex p-2  bg-gray-800">
                    <div class="flex py-3 px-2 items-center">
                        <p class="text-2xl text-green-500 font-semibold">NEWS</p class="ml-2 text-2xl font-semibold italic">
                        LETTER</p>
                    </div>
                </div>
                @role('admin')
                    <div class="flex  bg-gray-900 my-2 rounded-xl hover:bg-gray-700">

                        <button type="button" id="dashboard" class="font-bold text-base w-full text-gray-400 p-2 text-center ">DASHBOARD</button>

                    </div>

                    <div class="flex  bg-gray-900 my-2 rounded-xl hover:bg-gray-700">

                        <button type="submit" id="subscribe" class="font-bold text-base w-full text-gray-400 p-2 text-center ">SUBSCRIBE</button>

                    </div>
                @endrole

                @role('user')
                    <div class="flex  bg-gray-900 my-2 rounded-xl hover:bg-gray-700">

                        <button type="submit" id="media" class="font-bold text-base w-full text-gray-400 p-2 text-center ">MEDIA</button>

                    </div>

                    <div class="flex  bg-gray-900 my-2 rounded-xl hover:bg-gray-700">

                        <button type="submit" id="tamplate" class="font-bold text-base w-full text-gray-400 p-2 text-center ">TAMPLATE</button>

                    </div>
                @endrole

            </div>
        </div>
    </aside>

    <div class="flex flex-col flex-1 w-full overflow-y-auto">

        <!-- nav bar -->
        <header class=" w-full h-20 py-4 bg-gray-800 ">
            <div class="flex items-center justify-end h-8 px-6 mx-auto">
                
                
                <!-- log out -->
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center gap-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    
                        Log out
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>  
                  </form>
                
            </div>
        </header>

        {{-- <!-- pop up success -->
        @if (session('success'))
            <div  id="message" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 pt-14">
                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Success Content -->
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Title -->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold text-green-600">Success!</p>
                            <button id="closeModal" class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M6.4 4.4l7.2 7.2m0-7.2l-7.2 7.2"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Message -->
                        <p class="text-gray-800">{{ session('success') }}</p>
                    </div> 
            </div>
        @endif --}}

        <!-- pop up tamp -->
        <div id="form_tamp" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 pt-14 hidden">
            <div  class="container mx-auto mt-8 p-4 bg-gray-200 shadow-lg max-w-md rounded-md">
                <div id="popup-form" class="popup">
                    <h2 class="text-lg font-bold mb-4">Add tamplate</h2>
                    <form action="{{route('create.tamp')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
                        </div>
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                Image
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" >
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="video">
                                Video
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="video" type="file">
                        </div> --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>

        

        

        <!-- content -->
        <main class="">
            <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-green-500">

                {{-- @dd($users); --}}
                <div class="grid grid-cols-12 gap-6 ">

                    @role('admin')
                    {{-- dashboard --}}
                    <div id="dashboard_content" class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">

                        <!-- metrise -->
                        <div class="col-span-12 mt-8 -z-50 ">
                            <div class="flex justify-between items-center h-10 intro-y ">
                                <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>

                                <a href="{{route('download_pdf')}}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center gap-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Download PDF
                                    <svg class=" w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                    </svg>
                                </a>

                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 ">
                                <a class="  shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5 ">
                                        <div class="flex justify-between">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <div class="mt-1 text-base text-gray-600 font-bold">Tamplate</div>
                                            <div
                                                class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span class="flex items-center">Nbr</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">{{$templates_count}}</div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a class="   shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                            </svg> 
                                            <div class="mt-1 text-base text-gray-600 font-bold">Users</div>
                                            <div
                                                class="bg-yellow-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span class="flex items-center">Nbr</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">{{$userCount}}</div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class=" shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>
                                            
                                            <div class="mt-1 text-base text-gray-600 font-bold">Tag</div>
                                            <div
                                                class="bg-blue-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span class="flex items-center">Nbr</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">15</div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                        </div>

                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">
                            <div class="  h-fit col-span-12 mt-5">          
                                <input type="search" name="search" id="" class=" p-4 text-xl w-1/3 h-14 rounded-lg border border-gray-800" placeholder="search ...">
                            </div>
                            <!-- table USERS -->
                            <div class="col-span-12 mt-5">
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                    <div class="bg-white p-4 shadow-lg rounded-lg">
                                        <h1 class="font-bold text-base">Table users</h1>
                                        <div class="mt-4">
                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto">
                                                    <div class="py-2 align-middle inline-block min-w-full">
                                                        <div
                                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">ID</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2 ">Name</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Email</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Role</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Create At</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Edit At</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">ACTION</span>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    @foreach ($users as $user)
                                                                        
                                                                    
                                                                        <tr>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$user->id}} </p>

                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$user->name}} </p>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$user->email}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                @foreach ($userRoles[$user->id] as $role)
                                                                                    <p>{{ $role }}</p>                                                                            
                                                                                @endforeach                                                                                                                                                           
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$user->created_at}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$user->updated_at}} </p>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <div class="flex space-x-4">

                                                                                    <a  href="{{route('add.role', ['user' => $user])}}"
                                                                                        class=" text-blue-500 hover:text-blue-600">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="w-5 h-5 mr-1" fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke="currentColor">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                stroke-width="2"
                                                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                                        </svg>
                                                                                        <p>Assign Role</p>
                                                                                    </a>

                                                                                    <a  href="{{route('add.role', ['user' => $user])}}"
                                                                                        class=" text-green-500 hover:text-green-600">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            class="w-5 h-5 mr-1" fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke="currentColor">
                                                                                            <path stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                stroke-width="2"
                                                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                                        </svg>
                                                                                        <p>Assign Permission</p>
                                                                                    </a>
                                                                                    
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    {{ $users->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- table subscribers -->
                        <div class="col-span-12 mt-5">
                            <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                <div class="bg-white p-4 shadow-lg rounded-lg">
                                    <h1 class="font-bold text-base">Table subscribers</h1>
                                    <div class="mt-4">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto">
                                                <div class="py-2 align-middle inline-block min-w-full">
                                                    <div
                                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead>
                                                                <tr>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">ID</span>
                                                                        </div>
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Email</span>
                                                                        </div>
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Sub</span>
                                                                        </div>
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Status</span>
                                                                        </div>
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Create At</span>
                                                                        </div>
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Edit At</span>
                                                                        </div>
                                                                    </th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                                @foreach ($members as $member)
                                                                    
                                                                
                                                                    <tr>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                            <p> {{$member->id}} </p>

                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                            <p> {{$member->email}} </p>
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">  
                                                                             
                                                                            @if ($member->sub == 'subscribe')
                                                                            <p class=" bg-green-400 flex justify-center items-center text-white py-1 rounded-lg"> {{$member->sub}} </p>                                                                                
                                                                            @else
                                                                            <p class=" bg-gray-400 flex justify-center items-center text-white py-1 rounded-lg"> {{$member->sub}} </p> 
                                                                            @endif                                                                                                                                                        
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                            @if ($member->status == 'pending')
                                                                            <p class=" bg-red-400 flex justify-center items-center text-white py-1 rounded-lg"> {{$member->status}} </p>                                                                                
                                                                                                                                                        
                                                                            @else
                                                                            <p class=" bg-blue-400 flex justify-center items-center text-white py-1 rounded-lg"> {{$member->status}} </p> 
                                                                            @endif                                                                                                                                                             
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                <p> {{$member->created_at}} </p>                                                                            
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                            <p> {{$member->updated_at}} </p>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- subscribe --}}
                    <div id="subscribe_content" class="col-span-12 mt-8 -z-50 hidden">
                        <div class="flex items-center h-10 intro-y">
                            <h2 class="mr-5 text-lg font-medium truncate">Subscibe</h2>
                        </div>
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">
                            <div class="  h-fit col-span-12 mt-5">          
                                <input type="search" name="search" id="" class=" p-4 text-xl w-1/3 h-14 rounded-lg border border-gray-800" placeholder="search ...">
                            </div>
                            <!-- table subscribe -->
                            <div class="col-span-12 mt-5">
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                    <div class="bg-white p-4 shadow-lg rounded-lg">
                                        <h1 class="font-bold text-base">Table subscribe</h1>
                                        <div class="mt-4">
                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto">
                                                    <div class="py-2 align-middle inline-block min-w-full">
                                                        <div
                                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">ID</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Email</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Subscribtion</span>
                                                                        </div>
                                                                    </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Create At</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Edit At</span>
                                                                            </div>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    @foreach ($member_sub as $member)
                                                                        
                                                                    
                                                                        <tr>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member->id}} </p>

                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member->email}} </p>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$member->sub}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$member->created_at}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member->updated_at}} </p>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <!-- table unsubscribe -->
                            <div class="col-span-12 mt-5">
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                    <div class="bg-white p-4 shadow-lg rounded-lg">
                                        <h1 class="font-bold text-base">Table unsubscribe</h1>
                                        <div class="mt-4">
                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto">
                                                    <div class="py-2 align-middle inline-block min-w-full">
                                                        <div
                                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">ID</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Email</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                        class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                        <div class="flex cursor-pointer">
                                                                            <span class="mr-2">Subscribtion</span>
                                                                        </div>
                                                                    </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Create At</span>
                                                                            </div>
                                                                        </th>
                                                                        <th
                                                                            class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Edit At</span>
                                                                            </div>
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    @foreach ($member_unsub as $member_un)
                                                                        
                                                                    
                                                                        <tr>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member_un->id}} </p>

                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member_un->email}} </p>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$member_un->sub}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">                                                                                                                                                           
                                                                                    <p> {{$member_un->created_at}} </p>                                                                            
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                                <p> {{$member_un->updated_at}} </p>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    @endrole



                    @role('user')
                    {{-- media --}}
                    <div id="media_content" class="col-span-12 mt-8 -z-50 hidden">
                        <div class="flex items-center h-10 intro-y ">
                            <h2 class="mr-5 text-lg font-medium truncate">Media</h2>
                        </div>
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">
                            <div class="  h-fit col-span-12 mt-5 flex justify-between">          
                                <input type="search" name="search" id="" class=" p-4 text-xl w-1/3 h-14 rounded-lg border border-gray-800" placeholder="search ...">
                                
                            </div>
                            
                            <h1>image</h1>
                            <div class="  gap-2 0 grid grid-cols-5  h-fit col-span-12 mt-5">
                                
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                
                                
                                    
                            </div>

                            <h1>vidio</h1>
                            <div class="  gap-2 0 grid grid-cols-5  h-fit col-span-12 mt-5">
                                
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                
                                
                                    
                            </div>                            

                        </div>
                    </div>

                    {{-- tamplate --}}
                    <div id="tamplate_content" class="col-span-12 mt-8 -z-50  ">
                        <div class="flex items-center h-10 intro-y ">
                            <h2 class="mr-5 text-lg font-medium truncate">Tamplate</h2>
                        </div>
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">
                            <div class="  h-fit col-span-12 mt-5 flex justify-between">          
                                <input type="search" name="search" id="" class=" p-4 text-xl w-1/3 h-14 rounded-lg border border-gray-800" placeholder="search ...">

                                <div class="flex gap-3">
                                    <button id="show_form_tamp" type="button" class="text-white flex gap-1 bg-blue-600 hover:bg-blue-700  font-medium rounded-lg text-lg px-5 py-2.5 text-center  items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class=" w-7 h-7 ">
                                            <path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                        </svg>
                                        Add Tamplate
                                    </button>

                                    <a  href="{{route('arshved')}}" type="button" class="text-white flex gap-1 bg-green-600 hover:bg-green-700  font-medium rounded-lg text-lg px-5 py-2.5 text-center  items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class=" w-7 h-7 ">
                                            <path fill="#ffffff" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/>
                                        </svg>
                                        Restore
                                    </a>
                                </div>
                            </div>
                            
                            
                            <div class="  gap-2 0 grid grid-cols-4  h-fit col-span-12 mt-5 ">

                                @foreach ($templates as $template)
                                    
                                
                                    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                                        <!-- Newsletter Header -->
                                        <h1 class="text-2xl font-bold mb-2">{{ $template->title}}</h1>
                                        {{-- <p class="text-gray-700 mb-4">Your newsletter description goes here.</p> --}}
                                        
                                        <!-- Newsletter Content -->
                                        <div>
                                            <!-- Image -->
                                            <img alt="Newsletter Image" class="mb-4 rounded-lg" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                            
                                            <!-- Content -->
                                            <p class="text-gray-800 leading-relaxed mb-4">
                                                {{$template->description}}
                                            </p>
                                            </div>

                                            <div class="flex justify-between items-center space-x-4 ">

                                                <div class=" flex gap-2">
                                                    <a href="{{route('edit.tamp', ['template' => $template])}}"
                                                    class="text-blue-500 hover:text-blue-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 mr-1" fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <p>Edit</p>
                                                    </a>
                                                
                                                    <form action=" {{route('delete.temp', ['template' => $template])}} " method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 h-5 mr-1 ml-3"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            <p>Soft Delete</p>
                                                        </button>
                                                    </form>
                                                </div>

                                                <a href="{{route('send_to_email', ['template' => $template])}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send</a>

                                            </div>
                                    </div>
                                    
                                    
                                @endforeach
                                
                                
                                    
                            </div>

                            
                        </div>
                    </div>
                    @endrole


                </div>
            </div>

           
        </main>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function () {
        

        // Open pop-up dashborad
        $("#dashboard").click(function () {
              $("#dashboard_content").show();
              $("#media_content").hide();
              $("#subscribe_content").hide();
              $("#tamplate_content").hide();
          }); 

           // Open pop-up subscribe
           $("#subscribe").click(function () {
              $("#subscribe_content").show();
              $("#dashboard_content").hide();
              $("#media_content").hide();
              $("#tamplate_content").hide();
          }); 
        

        // Open pop-up media
        $("#media").click(function () {
              $("#media_content").show();
              $("#dashboard_content").hide();
              $("#subscribe_content").hide();
              $("#tamplate_content").hide();
          }); 

        // Open pop-up tamplate
        $("#tamplate").click(function () {
              $("#tamplate_content").show();
              $("#dashboard_content").hide();
              $("#subscribe_content").hide();
              $("#media_content").hide();
          }); 


          // Show form tamp
        $("#show_form_tamp").click(function () {
              $("#form_tamp").show();
          });
        
          $("#form_tamp").click(function (event) {
          if (event.target === this) {
              $(this).hide();
          }
        });


        

        


        $("#message").click(function (event) {
          if (event.target === this) {
              $(this).hide();
          }
        });

        
})
</script>
   
</body>
</html>

