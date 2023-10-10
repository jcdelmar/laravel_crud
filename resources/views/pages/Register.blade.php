<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Create an account</h3>
            <form action="/register" method="post">
                @csrf
                @method('post')
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Email<label>
                                <input type="text" placeholder="email@sample.com" name="email"  autocomplete="off"  value="{{ old('email') }}"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('email')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                    </div>
                    <div>
                        <label class="block" for="name">Name<label>
                                <input type="text" placeholder="Name" name="name"  autocomplete="off"  value="{{ old('name') }}"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('name')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                                </div>
                    <div class="mt-4">
                        <label class="block">Password<label>
                                <input type="password" placeholder="Password" name="password"  autocomplete="off"  
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('password')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block">Confirm Password<label>
                                <input type="password" placeholder="Password" name="password_confirmation"  autocomplete="off"  
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('password')
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create account</button>
                        <a href="/" class="text-sm text-blue-600 hover:underline">Back to login</a>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
</body>

</html>