<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Add a post</h1>
    
    <x-card class="py-8 px-16 mx-96">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
                <label for="description" class="mb-2 block text-sm font-medium text-slate-900">Description</label>
                <input name="description" class="border w-full p-2 border-slate-300"/>
                @error('description')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="image" class="mb-2 block text-sm font-medium text-slate-900">Image</label>
                <input name="image" type="file" class="border w-full p-2 border-slate-300"/>
                @error('image')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button class="w-full bg-green-100 p-4">Publish the post</button>
        </form>
    </x-card>
</x-layout>