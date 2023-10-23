<div>
    <input type="text" class="border w-full p-2 rounded-lg" placeholder="Search a user" wire:model.live="search">
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('users.show', $user) }}">
                    <div class="border my-2 p-2 rounded-md flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/'.$user->image_path) }}" alt="" class="w-10 h-10 object-cover rounded-full">
                            <div class="flex flex-col ml-4">
                                <label class="text-xl font-semibold">{{$user->username}}</label>
                                <label class="">{{$user->name}}</label>
                            </div>
                        </div>
                        @auth
                            @if (auth()->user()->followings->contains($user))
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" class="w-6 h-6">
                                <title>You follow this user</title>
                                <circle cx="17.99" cy="10.36" r="6.81" class="clr-i-solid clr-i-solid-path-1"/><path d="M12,26.65a2.8,2.8,0,0,1,4.85-1.8L20.71,29l6.84-7.63A16.81,16.81,0,0,0,18,18.55,16.13,16.13,0,0,0,5.5,24a1,1,0,0,0-.2.61V30a2,2,0,0,0,1.94,2h8.57l-3.07-3.3A2.81,2.81,0,0,1,12,26.65Z" class="clr-i-solid clr-i-solid-path-2"/><path d="M28.76,32a2,2,0,0,0,1.94-2V26.24L25.57,32Z" class="clr-i-solid clr-i-solid-path-3"/><path d="M33.77,18.62a1,1,0,0,0-1.42.08l-11.62,13-5.2-5.59A1,1,0,0,0,14.12,26a1,1,0,0,0,0,1.42l6.68,7.2L33.84,20A1,1,0,0,0,33.77,18.62Z" class="clr-i-solid clr-i-solid-path-4"/>
                                <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                            </svg>
                        @endif
                        @endauth
                    </div>
                
                </a>
                
            </li>
        @endforeach
    </ul>
</div>
