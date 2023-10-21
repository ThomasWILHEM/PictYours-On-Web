<div>
    <input type="text" class="border w-full p-2 rounded-lg" placeholder="Search a user" wire:model.live="search">
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('users.show', $user) }}">
                    <div class="border my-2 p-2 rounded-md flex items-center">
                        <img src="{{ asset('storage/'.$user->image_path) }}" alt="" class="w-10 h-10 object-cover rounded-full">
                        <div class="flex flex-col ml-4">
                            <label class="text-xl font-semibold">{{$user->username}}</label>
                            <label class="">{{$user->name}}</label>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
