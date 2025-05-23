<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-tags mr-2"></i>
            Daftar Kategori
        </h2>
        <a href="index.php?entity=kategori&action=add" 
           class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Kategori
        </a>
    </div>

    <?php if (empty($kategoriList)): ?>
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-tags text-4xl mb-4"></i>
            <p>Belum ada data kategori</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($kategoriList as $kategori): ?>
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white w-10 h-10 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800"><?php echo htmlspecialchars($kategori['nama_kategori']); ?></h3>
                            <p class="text-sm text-gray-500">ID: <?php echo $kategori['id']; ?></p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="index.php?entity=kategori&action=edit&id=<?php echo $kategori['id']; ?>" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg text-sm transition duration-300">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?entity=kategori&action=delete&id=<?php echo $kategori['id']; ?>" 
                           class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg text-sm transition duration-300"
                           onclick="return confirmDelete('Apakah Anda yakin ingin menghapus kategori ini?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php
require_once 'views/template/footer.php';
?>