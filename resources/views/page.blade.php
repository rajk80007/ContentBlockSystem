<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content Block System </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto mt-10 w-1/2">
        <h1 class="text-2xl font-bold">Content Block System</h1>
        @if(session()->has('sucess'))
            <div class="bg-green-500 text-white p-4 rounded w-1/2 mx-auto mt-4" onclick="this.classList.add('hidden')">
                {{ session()->get('success') }}
            </div>
        @endif
        <form action="{{ route('save-content') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05]">
            @csrf
            <div class="flex flex-col">
                <label for="page_id" class="mb-2">Select Page</label>
                <select name="page_id" id="page_id" class="border border-gray-300 px-4 py-2">
                    @foreach ($pages as $page)
                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="flex flex-col">
                <label for="title" class="mb-2">Title</label>
                <input type="text" name="title" class="border border-gray-300 px-4 py-2">
            </div>

            <div id="type" class="flex flex-col">
                <label for="type" class="mb-2">Type</label>
                <select name="type" id="type" class="border border-gray-300 px-4 py-2">
                    <option value="text">Text</option>
                    <option value="image">Image</option>
                </select>
            </div>

            <div id="textBlock" class="flex flex-col">
                <label for="content" class="mb-2">Content</label>
                <textarea name="content" id="text" cols="30" rows="5" class="border border-gray-300 px-4 py-2"></textarea>
            </div>

            <div id="imageBlock" class="hidden" class="flex flex-col ">
                <label for="image" class="mb-2">Image</label><input type="file" name="image" class="border border-gray-300 px-4 py-2"></label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>

        </form>
    </div>
    <script>
        const type = document.querySelector('#type');
        const textBlock = document.querySelector('#textBlock');
        const imageBlock = document.querySelector('#imageBlock');
        type.addEventListener('change', (e) => {
            if (e.target.value === 'text') {
                textBlock.classList.remove('hidden');
                imageBlock.classList.add('hidden');
            } else if (e.target.value === 'image') {
                textBlock.classList.add('hidden');
                imageBlock.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>