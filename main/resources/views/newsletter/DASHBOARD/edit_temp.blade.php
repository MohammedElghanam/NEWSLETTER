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

    <div  class="container mx-auto mt-8 p-4 bg-gray-200 shadow-lg max-w-md rounded-md">

        <h2 class="text-2xl font-bold mb-4 text-center">Edit Template</h2>
        <form action="{{route('update.tamp', ['template' => $template] )}}" method="POST">
            
            @csrf
            @method('PUT')
            {{-- @method('POST') --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" placeholder="Enter blog title"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$template->title}}">
                    <span id="title_error" class="text-red-600"></span>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter blog description"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{$template->description}}</textarea>
                    <span id="description_error" class="text-red-600"></span>
            </div>

            <button type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit Template
            </button>

        </form>

    </div>

    
</body>
</html>