<x-layouts.auth title="Login">
    <form method="POST" action="/login" class="bg-white p-6-rounded shadow-md w-96">
        @csrf
        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                {{ $errors->first() }}
            </div>
            @endif


        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border w-full p-2 rounded"required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border w-full p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white w-full p-2 rounded">Login</button>
    </form>
</x-layouts.auth>
