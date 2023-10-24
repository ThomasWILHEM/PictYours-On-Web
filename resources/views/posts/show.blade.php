<x-layout>
    @livewireScripts

    <x-card class="mx-80 my-10">
        <div class="flex justify-between w-full items-center mb-4">
            <div>
                <a href="{{ route('users.show', $post->user) }}" class="flex w-fit">
                    <img src="{{ asset('storage/'.$post->user->image_path) }}" alt="" class="w-14 h-14 object-cover rounded-full">
                    <label class="flex items-center mx-4 text-xl">{{$post->user->username}}</label>
                </a>
            </div>
            <div>
                <livewire:like-counter postId="{{$post->id}}"/>
            </div>
        </div>
        <div class="mb-4">
            <img src="{{ asset('storage/'.$post->image_path) }}" alt="" class="m-auto h-full w-full object-cover rounded-lg">
        </div>
        <div class="grid grid-cols-3 w-full items-center">
            <div class="text-left">
                {{$post->description}}
            </div>
            <div class="text-center">
                @auth
                    @if (auth()->user()->id != $post->user_id)
                        <livewire:like-button postId="{{$post->id}}"/>
                    @else
                        <form action="{{ route('posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button title="Delete this post">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                  </svg>
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class="text-right">
                Posted {{$post->created_at->diffForHumans()}}
            </div>
        </div>

    </x-card>

</x-layout>