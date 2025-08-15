<x-layouts.main title="Dashboard">
    <x-slot name="pageTitle">Dashboard</x-slot>
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-xl font-bold mb-4">Welcome to the Dashboard!</h2>
        <p class="mt-2">Logged in as <strong>"{{ Auth::user()->name }}"</strong></p>
    </div>
</x-layouts.main>
