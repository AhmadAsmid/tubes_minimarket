<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-extrabold text-gray-900 dark:text-gray-100 tracking-wide">
                    Welcome Back, User!
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mt-4">We’re excited to have you here. Start exploring your dashboard.</p>
            </div>

            <!-- Welcome Card Area -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8 mb-8">
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-lg p-8 text-center">
                    <h2 class="text-3xl font-semibold text-white">You're Logged In!</h2>
                    <p class="mt-4 text-lg text-white opacity-80">Everything is set up and ready for you to explore your personalized dashboard. Enjoy!</p>
                </div>
            </div>

            <!-- Info Section with Hover and Shadows -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Notification Card -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105 ease-in-out">
                    <div class="flex items-center justify-between space-x-4">
                        <div class="p-3 bg-blue-500 text-white rounded-full">
                            <i class="fas fa-bell text-2xl"></i>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">New Notifications</h3>
                            <p class="text-gray-500 dark:text-gray-400">Check your recent notifications and updates.</p>
                        </div>
                    </div>
                </div>

                <!-- Account Settings Card -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105 ease-in-out">
                    <div class="flex items-center justify-between space-x-4">
                        <div class="p-3 bg-green-500 text-white rounded-full">
                            <i class="fas fa-cogs text-2xl"></i>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Account Settings</h3>
                            <p class="text-gray-500 dark:text-gray-400">Customize your preferences and settings here.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Card -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105 ease-in-out">
                    <div class="flex items-center justify-between space-x-4">
                        <div class="p-3 bg-red-500 text-white rounded-full">
                            <i class="fas fa-link text-2xl"></i>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Quick Links</h3>
                            <p class="text-gray-500 dark:text-gray-400">Easily access frequently used features.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
