<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Toko Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <h1 class="text-2xl font-bold text-white">
                    <i class="fas fa-book mr-2"></i>
                    Toko Buku Digital
                </h1>
                <ul class="flex space-x-6">
                    <li>
                        <a href="index.php?entity=buku" class="text-white hover:text-blue-200 transition duration-300 flex items-center">
                            <i class="fas fa-book mr-1"></i>
                            Buku
                        </a>
                    </li>
                    <li>
                        <a href="index.php?entity=kategori" class="text-white hover:text-blue-200 transition duration-300 flex items-center">
                            <i class="fas fa-tags mr-1"></i>
                            Kategori
                        </a>
                    </li>
                    <li>
                        <a href="index.php?entity=penerbit" class="text-white hover:text-blue-200 transition duration-300 flex items-center">
                            <i class="fas fa-building mr-1"></i>
                            Penerbit
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">