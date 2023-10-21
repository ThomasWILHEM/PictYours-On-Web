<x-layout>
    @livewireScripts
    <div class="flex">
        <x-card class="w-1/6 mx-16 my-10 h-fit">
            <livewire:user-list /> 
        </x-card>
        <x-card class="my-10 w-5/6 mx-16">
            <div class="w-full text-center text-3xl mb-6 border-b-4 border-slate-200 pb-4">
                Latests Posts
            </div>
            <div class="grid grid-cols-3 justify-items-center">
                @forelse ($posts as $post)
                    <div class="mb-4 h-80 w-80 ">
                        <a href="{{ route('posts.show', $post) }}">
                            <img src="{{ asset('storage/'.$post->image_path) }}" alt="" class="m-auto h-full w-full object-cover rounded-lg">
                        </a>
                    </div>
                @empty
                    <div class="w-full text-center text-xl">
                        No posts available
                    </div>
                @endforelse
            </div>
        </x-card>
    </div>
</x-layout>