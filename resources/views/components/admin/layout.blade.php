{{-- resources/views/components/admin/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 mt-9">

    {{-- Navbar --}}
    <x-admin.navbar />

    {{-- Sidebar --}}
    <x-admin.sidebar />

    {{-- Konten halaman --}}
    <main class="p-4 md:ml-64">
        {{ $slot }}
    </main>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
</body>
</html>