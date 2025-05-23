<?php
require_once 'views/template/header.php';
?>

<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-<?php echo isset($buku) ? 'edit' : 'plus'; ?> mr-2"></i>
            <?php echo isset($buku) ? 'Edit Buku' : 'Tambah Buku'; ?>
        </h2>
    </div>

    <form action="index.php?entity=buku&action=<?php echo isset($buku) ? 'update&id=' . $buku['id'] : 'save'; ?>" 
          method="POST" class="space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-book mr-1"></i>
                    Judul Buku
                </label>
                <input type="text" name="judul" 
                       value="<?php echo isset($buku) ? htmlspecialchars($buku['judul']) : ''; ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required placeholder="Masukkan judul buku">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user mr-1"></i>
                    Pengarang
                </label>
                <input type="text" name="pengarang" 
                       value="<?php echo isset($buku) ? htmlspecialchars($buku['pengarang']) : ''; ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required placeholder="Masukkan nama pengarang">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tags mr-1"></i>
                    Kategori
                </label>
                <select name="kategori_id" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategoriList as $kategori): ?>
                    <option value="<?php echo $kategori['id']; ?>" 
                            <?php echo isset($buku) && $buku['kategori_id'] == $kategori['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-building mr-1"></i>
                    Penerbit
                </label>
                <select name="penerbit_id" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        required>
                    <option value="">Pilih Penerbit</option>
                    <?php foreach ($penerbitList as $penerbit): ?>
                    <option value="<?php echo $penerbit['id']; ?>" 
                            <?php echo isset($buku) && $buku['penerbit_id'] == $penerbit['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($penerbit['nama_penerbit']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-money-bill mr-1"></i>
                    Harga (Rp)
                </label>
                <input type="number" name="harga" 
                       value="<?php echo isset($buku) ? $buku['harga'] : ''; ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required min="0" step="1000" placeholder="0">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-boxes mr-1"></i>
                    Stok
                </label>
                <input type="number" name="stok" 
                       value="<?php echo isset($buku) ? $buku['stok'] : ''; ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required min="0" placeholder="0">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-calendar mr-1"></i>
                    Tahun Terbit
                </label>
                <input type="number" name="tahun_terbit" 
                       value="<?php echo isset($buku) ? $buku['tahun_terbit'] : ''; ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required min="1900" max="<?php echo date('Y'); ?>" placeholder="<?php echo date('Y'); ?>">
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-6 border-t">
            <a href="index.php?entity=buku" 
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