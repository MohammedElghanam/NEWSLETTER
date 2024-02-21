<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Role to User</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex justify-center items-center h-screen">
    <!-- Trigger Button -->
    

    <!-- Modal -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center ">
        <div class="modal-overlay absolute w-full h-full "></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Add Role Form -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Title -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Add Role to User</p>
                    <button id="closeModal" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M6.4 4.4l7.2 7.2m0-7.2l-7.2 7.2"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Role Form -->
                <form class="mb-6" action="{{route('assign.role', ['user' => $user])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Role Selection -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                            Select Role
                        </label>
                        <select id="role" name="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" disabled selected>Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}"> {{$role->name}} </option>
                                @endforeach
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Assign role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>
