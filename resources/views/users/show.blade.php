<x-layout>
    <x-card class="mx-80 my-10">
        <div class="flex items-center">
            <img src="{{ asset('storage/'.$user->image_path) }}" alt="" class="w-48 h-48 object-cover rounded-full">
            <div class="flex flex-col mx-4">
                <label class="text-4xl">
                    {{$user->name}}
                </label>
                <label class="text-2xl text-slate-800 font-semibold">
                    {{$user->username}}
                </label>
            </div>
        </div>
    </x-card>
    <x-card class="mx-80 my-10">
        <div class="w-full text-center text-3xl mb-6 border-b-4 border-slate-200 pb-4">
            {{$user->name}}'s Posts
        </div>
        <div class="grid grid-cols-3 justify-items-center">
            @forelse ($user->posts as $post)
                <div class="mb-4 h-80 w-80 ">
                    <a href="{{ route('posts.show', $post) }}">
                        <img src="{{ asset('storage/'.$post->image_path) }}" alt="" class="m-auto h-full w-full object-cover rounded-lg">
                    </a>
                </div>
            @empty
                <div class="w-full text-center text-xl">
                    This user has no posts
                </div>
            @endforelse
        </div>
    </x-card>
</x-layout>