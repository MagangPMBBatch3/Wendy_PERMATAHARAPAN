@extends('components.layouts.auth')

@section('content')
<div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      Sign in to your account
    </h2>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input id="password" name="password" type="password" required autocomplete="current-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
          @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-6">
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
