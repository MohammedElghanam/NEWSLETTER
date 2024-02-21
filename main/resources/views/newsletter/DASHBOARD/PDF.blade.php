<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div id="dashboard_content" class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">

        <!-- metrise -->
        <div class="col-span-12 mt-8 -z-50 ">
            <div class="flex justify-between items-center h-10 intro-y ">
                <h2 class="mr-5 text-lg font-medium truncate">Dashboard</h2>
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
                
                
            </div>
        </div>

        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9 ">
            
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
                                                            <p class=" bg-green-400 flex justify-center items-center text-white py-1 rounded-lg"> {{$member->status}} </p> 
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

</body>
</html>