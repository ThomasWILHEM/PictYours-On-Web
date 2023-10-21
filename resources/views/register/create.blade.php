<x-layout>
    <x-card class="py-8 px-16 mx-96 mt-4">
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
                <label for="username" class="mb-2 block text-sm font-medium text-slate-900">Username</label>
                <input name="username" class="border w-full p-2 border-slate-300"/>
                @error('username')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="name" class="mb-2 block text-sm font-medium text-slate-900">Name</label>
                <input name="name" class="border w-full p-2 border-slate-300"/>
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

            <div class="mb-8">
                <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Email</label>
                <input name="email" class="border w-full p-2 border-slate-300"/>
                @error('email')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Password</label>
                <input name="password" type="password" class="border w-full p-2 border-slate-300"/>
                @error('password')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        {{$message}}
                    </div>
                @enderror
            </div>


            <button class="w-full bg-green-100 p-4">Register</button>
        </form>
    </x-card>
</x-layout>