<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Sign in to your account</h1>
    
    <x-card class="py-8 px-16 mx-96">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            @error('error')
                <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                    Invalid credientials
                </div>
            @enderror

            <div class="mb-8">
                <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Email</label>
                <input name="email" class="border w-full p-2 border-slate-300"/>
                @error('email')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        Email required
                    </div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Password</label>
                <input name="password" type="password" class="border w-full p-2 border-slate-300"/>
                @error('password')
                    <div class="border-l-4 border-red-500 bg-red-200 p-2 my-2">
                        Password required
                    </div>
                @enderror
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="{{ route('register.create') }}" class="text-indigo-600 hover:underline">Create an account</a>
                </div>
            </div>

            <button class="w-full bg-green-100 p-4">Login</button>
        </form>
    </x-card>
</x-layout>