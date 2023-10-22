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
                    @endif
                @endauth
            </div>
            <div class="text-right">
                Posted {{$post->created_at->diffForHumans()}}
            </div>
        </div>

    </x-card>

</x-layout>