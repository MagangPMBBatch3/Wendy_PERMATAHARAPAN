<div class="bg-white shadow rounded mb-4 flex justify-between items-center p-4">
    <h1 class="text-xl font-bold"> {{ $pageTitle ?? 'Dashboard' }}</h1>
    <p>Welcome to the dashboard!</p>
    <span> Halo, {{ Auth::user()->name ?? 'Guest' }}</span>
</div>
