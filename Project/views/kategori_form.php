<?php
require_once 'views/template/header.php';
?>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-<?php echo isset($kategori) ? 'edit' : 'plus'; ?> mr-2"></i>
            <?php echo isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori'; ?>
        </h2>
    </div>

    <form action="index.php?entity=kategori&action=<?php echo isset($kategori) ? 'update&id=' . $kategori['id'] : 'save'; ?>" 
          method="POST" class="space-y-6">
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-tag mr-1"></i>
                Nama Kategori
            </label>
            <input type="text" name="nama_kategori" 
                   value="<?php echo isset($kategori) ? htmlspecialchars($kategori['nama_kategori']) : ''; ?>" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                   required placeholder="Masukkan nama kategori">
        </div>

        <div class="flex justify-end space-x-3 pt-6 border-t">
            <a href="index.php?entity=kategori" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-times mr-2"></i>
                Batal
            </a>
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-2 rounded-lg transition duration-300 flex items-center">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>