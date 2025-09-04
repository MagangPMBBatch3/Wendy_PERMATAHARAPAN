<nav class="bg-white border-b border-gray-200 px-4 py-3 flex justify-between items-center relative">
    <div class="flex items-center space-x-4">
        <button id="sidebarToggle" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <h1 class="text-lg font-semibold text-gray-700">{{ $title ?? 'Dashboard' }}</h1>
    </div>

    <!-- User Profile Circle -->
    <div id="userProfileCircle" class="w-10 h-10 rounded-full overflow-hidden cursor-pointer border-2 border-gray-300" title="Edit Profile">
        <img src="{{ auth()->user()->profile_photo_url ?? '/default-profile.png' }}" alt="User Profile" class="w-full h-full object-cover" />
    </div>

    <script>
        document.getElementById('userProfileCircle').addEventListener('click', function() {
            window.location.href = "{{ url('/userprofile/profile') }}";
        });
    </script>
</nav>
