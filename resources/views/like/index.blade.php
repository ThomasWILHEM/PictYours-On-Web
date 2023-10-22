<x-layout>
    <div class="flex">
        <x-card class="my-10 w-full mx-16">
            <div class="w-full text-center text-3xl mb-6 border-b-4 border-slate-200 pb-4">
                Liked Posts
            </div>
            <div class="grid grid-cols-3 justify-items-center">
                @forelse ($likedPosts as $likedPost)
                    <div class="mb-4 h-80 w-80 ">
                        <a href="{{ route('posts.show', $likedPost->post) }}">
                            <img src="{{ asset('storage/'.$likedPost->post->image_path) }}" alt="" class="m-auto h-full w-full object-cover rounded-lg">
                        </a>
                    </div>
                @empty
                    <div></div>
                    <div class="w-full text-center text-xl">
                        No posts liked yet
                    </div>
                @endforelse
            </div>
        </x-card>
    </div>
</x-layout>