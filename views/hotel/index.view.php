<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraveLK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <div class="flex items-center space-x-2 mb-6">
                <img class="h-8" src="logo.png" alt="Logo">
                <span class="text-lg font-semibold">Hotel Dashboard</span>
            </div>
            <a href="/" class="py-2 px-3 rounded bg-gray-900">Dashboard</a>
            <a href="/accomodation_hotel" class="py-2 px-3 rounded hover:bg-gray-700">Accomodation</a>
            <a href="/dining_hotel" class="py-2 px-3 rounded hover:bg-gray-700">Dining</a>
            <a href="/others_hotel" class="py-2 px-3 rounded hover:bg-gray-700">Other Services</a>
            <a href="/reports_hotel" class="py-2 px-3 rounded hover:bg-gray-700">Reports</a>
        </nav>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-lg font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full bg-gray-800 text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <main class="p-6 flex-1 bg-gray-50">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">Welcome to the Hotel Dashboard</h2>
                    <p class="mt-2 text-gray-600">Manage your team, projects, and reports from here.</p>
                </div>
            </main>
        </div>
    </div>
    <?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
</body>

</html>
