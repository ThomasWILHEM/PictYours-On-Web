<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Edit your profile</h1>

    <x-card class="py-8 px-16 mx-96 mt-4">
        <form action="{{ route('users.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex justify-around">
                <div class="flex flex-col justify-center text-center">
                    <img src="{{ asset('storage/'.$user->image_path) }}" alt="" class="w-60 h-60 object-cover rounded-full">
                    <div class="mt-4">Your acutal profil picture</div>
                </div>
                <div class="w-4/6">
                    <div class="mb-8">
                        <label for="username" class="mb-2 block text-sm font-medium text-slate-900">Username</label>
                        <input name="username" class="border w-full p-2 border-slate-300" value="{{$user->username}}"/>
                        @error('username')
                            <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
        
                    <div class="mb-8">
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-900">Name</label>
                        <input name="name" class="border w-full p-2 border-slate-300" value="{{$user->name}}"/>
                        @error('name')
                            <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
        
                    
                    <div class="mb-8">
                        <label for="image" class="mb-2 block text-sm font-medium text-slate-900">Profile Picture</label>
                        <input name="image" type="file" class="border w-full p-2 border-slate-300"/>
                    </div>
                </div>
                
            </div>

            <button class="w-full bg-green-100 p-4 mt-4">Edit</button>
        </form>
    </x-card>
</x-layout>