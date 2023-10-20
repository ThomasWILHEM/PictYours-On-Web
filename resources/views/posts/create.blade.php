<x-layout>
    {{$errors}}
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" class="border">
        </div>
        <div>
            <label for="description">Image</label>
            <input type="file" name="image">
        </div>

        <button class="border">Add</button>
    </form>
</x-layout>