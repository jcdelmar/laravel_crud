<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Contact</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="px-32 py-32 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Create a contact</h3>
            <form action="/createContact" method="post">
                @csrf
                @method('post')
                <div class="mt-8">
                    <div class="mt-2">
                        <label class="block" for="contact_name">Contact Name<label>
                        <input type="text" placeholder="Contact Name"  autocomplete="off" name="contact_name"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        @error('contact_name')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block" for="contact_company">Company<label>
                        <input type="text" placeholder="Contact Company"  autocomplete="off" name="contact_company"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        @error('contact_company')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block" for="phone">Phone<label>
                        <input type="text" placeholder="Phone"  autocomplete="off" name="contact_phone"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        @error('contact_phone')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label class="block" for="contact_email">Contact Email<label>
                        <input type="text" placeholder="Contact Email"  autocomplete="off" name="contact_email"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        @error('contact_email')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <input value="{{session('id');}}" name="user_id" hidden/>
                    
                    <div class="flex items-baseline justify-between mt-4">
                        <a href="/home">
                            <span class="px-6 py-2 mt-4 text-white bg-gray-600 rounded-lg hover:bg-gray-900">Back</span>
                        </a>
                        <button type="submit" class="px-6 py-2 mt-4 text-white bg-green-600 rounded-lg hover:bg-green-900">Create Contact</button>

                    </div>
                </div>
            </form>
        </div>
      
    
    </div>
    
</body>
</html>