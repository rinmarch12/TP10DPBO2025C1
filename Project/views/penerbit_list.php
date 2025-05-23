<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-building mr-2"></i>
            Daftar Penerbit
        </h2>
        <a href="index.php?entity=penerbit&action=add" 
           class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Penerbit
        </a>
    </div>

    <?php if (empty($penerbitList)): ?>
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-building text-4xl mb-4"></i>
            <p>Belum ada data penerbit</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($penerbitList as $penerbit): ?>
            <div class="bg-gradient-to-br from-green-50 to-blue-50 border border-gray-200 rounded-lg p-5 hover:shadow-md transition duration-300">
                <div class="flex items-start justify-between">
                    <div class="flex items-start">
                        <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-lg text-gray-800 mb-1">
                                <?php echo htmlspecialchars($penerbit['nama_penerbit']); ?>
                            </h3>
                            <p class="text-gray-600 text-sm mb-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <?php echo htmlspecialchars($penerbit['alamat']); ?>
                            </p>
                            <p class="text-xs text-gray-500">ID: <?php echo $penerbit['id']; ?></p>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <a href="index.php?entity=penerbit&action=edit&id=<?php echo $penerbit['id']; ?>" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg text-sm transition duration-300 text-center">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?entity=penerbit&action=delete&id=<?php echo $penerbit['id']; ?>" 
                           class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg text-sm transition duration-300 text-center"
                           onclick="return confirmDelete('Apakah Anda yakin ingin menghapus penerbit ini?');">
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