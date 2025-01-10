
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bagian Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-800 dark:text-gray-200">Welcome Back!</h1>
                <p class="text-lg text-gray-500 dark:text-gray-400">We're glad to see you again</p>
            </div>
            
            <!-- Card Area -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-8">
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg p-6 text-center">
                    <h2 class="text-2xl font-semibold text-white">You're Logged In!</h2>
                    <p class="mt-2 text-lg text-white">Enjoy browsing and exploring your dashboard</p>
                </div>
            </div>

            <!-- Info Section -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Example Info Card 1 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">New Notifications</h3>
                    <p class="text-gray-500 dark:text-gray-400">Check your recent notifications and updates</p>
                </div>

                <!-- Example Info Card 2 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Account Settings</h3>
                    <p class="text-gray-500 dark:text-gray-400">Customize your account preferences</p>
                </div>

                <!-- Example Info Card 3 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Quick Links</h3>
                    <p class="text-gray-500 dark:text-gray-400">Access frequently used features easily</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

