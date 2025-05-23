</div>
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="flex items-center justify-center">
                <i class="fas fa-copyright mr-2"></i>
                2025 Sistem Manajemen Toko Buku
            </p>
        </div>
    </footer>

    <script>
        // Konfirmasi hapus
        function confirmDelete(message = 'Apakah Anda yakin ingin menghapus data ini?') {
            return confirm(message);
        }
        
        // Format angka untuk harga
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(angka);
        }
    </script>
</body>
</html>