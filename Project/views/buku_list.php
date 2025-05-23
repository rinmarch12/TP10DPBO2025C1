<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-list mr-2"></i>
            Daftar Buku
        </h2>
        <a href="index.php?entity=buku&action=add" 
           class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Buku
        </a>
    </div>

    <?php if (empty($bukuList)): ?>
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-book text-4xl mb-4"></i>
            <p>Belum ada data buku</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                        <th class="border border-gray-300 p-3 text-left">No</th>
                        <th class="border border-gray-300 p-3 text-left">Judul</th>
                        <th class="border border-gray-300 p-3 text-left">Pengarang</th>
                        <th class="border border-gray-300 p-3 text-left">Kategori</th>
                        <th class="border border-gray-300 p-3 text-left">Penerbit</th>
                        <th class="border border-gray-300 p-3 text-left">Harga</th>
                        <th class="border border-gray-300 p-3 text-left">Stok</th>
                        <th class="border border-gray-300 p-3 text-left">Tahun</th>
                        <th class="border border-gray-300 p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bukuList as $index => $buku): ?>
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="border border-gray-300 p-3"><?php echo $index + 1; ?></td>
                        <td class="border border-gray-300 p-3 font-medium"><?php echo htmlspecialchars($buku['judul']); ?></td>
                        <td class="border border-gray-300 p-3"><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                        <td class="border border-gray-300 p-3">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">
                                <?php echo htmlspecialchars($buku['nama_kategori']); ?>
                            </span>
                        </td>
                        <td class="border border-gray-300 p-3"><?php echo htmlspecialchars($buku['nama_penerbit']); ?></td>
                        <td class="border border-gray-300 p-3 text-right font-semibold text-green-600">
                            Rp <?php echo number_format($buku['harga'], 0, ',', '.'); ?>
                        </td>
                        <td class="border border-gray-300 p-3 text-center">
                            <span class="<?php echo $buku['stok'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?> px-2 py-1 rounded-full text-sm">
                                <?php echo $buku['stok']; ?>
                            </span>
                        </td>
                        <td class="border border-gray-300 p-3 text-center"><?php echo $buku['tahun_terbit']; ?></td>
                        <td class="border border-gray-300 p-3 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="index.php?entity=buku&action=edit&id=<?php echo $buku['id']; ?>" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm transition duration-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?entity=buku&action=delete&id=<?php echo $buku['id']; ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm transition duration-300"
                                   onclick="return confirmDelete('Apakah Anda yakin ingin menghapus buku ini?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php
require_once 'views/template/footer.php';
?>