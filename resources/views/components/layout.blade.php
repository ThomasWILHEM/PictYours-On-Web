<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PictYours</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%">
        @if (isset($success))
            <div class="border-l-green-700 border-l-4 bg-green-400">
                {{$success}}
            </div>
        @endif

        <x-card class="mx-16 mt-5">
            <nav>
                <div class="flex justify-between mx-5 my-1">
                    <div class="flex">
                        <div>
                            <a href="{{ route('posts.index') }}" class="text-slate-800 text-2xl">Home</a>
                        </div>
                        @auth
                            <div class="text-slate-800 text-2xl mx-4">|</div>
                            <div>
                                <a href="{{ route('following-posts.index') }}" class="text-slate-800 text-2xl">My Followings</a>
                            </div>
                        @endauth
                    </div>
                    
                    <div class="text-slate-800 text-3xl">
                        Pictyours
                    </div>
                    <div class="text-slate-800 text-2xl">
                        @auth
                            <div class="flex  items-center">
                                <a href="{{ route('users.show', auth()->user()) }}" title="Your account">{{auth()->user()->username}}</a>
                                <label class="mx-4">|</label>
                                <a href="{{ route('likes.index') }}" title="Liked posts">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('auth.destroy', auth()->user()->id ) }}" class="flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-2" title="Logout">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('auth.create') }}">Log In</a>
                        @endauth
                    </div>
                </div>                
            </nav>
        </x-card>
        {{$slot}}
    </body>
</html>
