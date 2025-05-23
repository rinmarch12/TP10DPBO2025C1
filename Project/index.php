<?php
require_once 'viewmodel/BukuViewModel.php';
require_once 'viewmodel/KategoriViewModel.php';
require_once 'viewmodel/PenerbitViewModel.php';

// Mendapatkan parameter dari URL
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'buku';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Routing untuk entitas Buku
if ($entity == 'buku') {
    $viewModel = new BukuViewModel();
    
    if ($action == 'list') {
        $bukuList = $viewModel->getBukuList();
        require_once 'views/buku_list.php';
        
    } elseif ($action == 'add') {
        $kategoriList = $viewModel->getKategoriList();
        $penerbitList = $viewModel->getPenerbitList();
        require_once 'views/buku_form.php';
        
    } elseif ($action == 'edit') {
        $buku = $viewModel->getBukuById($_GET['id']);
        $kategoriList = $viewModel->getKategoriList();
        $penerbitList = $viewModel->getPenerbitList();
        require_once 'views/buku_form.php';
        
    } elseif ($action == 'save') {
        $result = $viewModel->addBuku(
            $_POST['judul'], 
            $_POST['pengarang'], 
            $_POST['harga'], 
            $_POST['stok'], 
            $_POST['kategori_id'], 
            $_POST['penerbit_id'], 
            $_POST['tahun_terbit']
        );
        if ($result) {
            header('Location: index.php?entity=buku&success=add');
        } else {
            header('Location: index.php?entity=buku&error=add');
        }
        
    } elseif ($action == 'update') {
        $result = $viewModel->updateBuku(
            $_GET['id'], 
            $_POST['judul'], 
            $_POST['pengarang'], 
            $_POST['harga'], 
            $_POST['stok'], 
            $_POST['kategori_id'], 
            $_POST['penerbit_id'], 
            $_POST['tahun_terbit']
        );
        if ($result) {
            header('Location: index.php?entity=buku&success=update');
        } else {
            header('Location: index.php?entity=buku&error=update');
        }
        
    } elseif ($action == 'delete') {
        $result = $viewModel->deleteBuku($_GET['id']);
        if ($result) {
            header('Location: index.php?entity=buku&success=delete');
        } else {
            header('Location: index.php?entity=buku&error=delete');
        }
    }
    
// Routing untuk entitas Kategori
} elseif ($entity == 'kategori') {
    $viewModel = new KategoriViewModel();
    
    if ($action == 'list') {
        $kategoriList = $viewModel->getKategoriList();
        require_once 'views/kategori_list.php';
        
    } elseif ($action == 'add') {
        require_once 'views/kategori_form.php';
        
    } elseif ($action == 'edit') {
        $kategori = $viewModel->getKategoriById($_GET['id']);
        require_once 'views/kategori_form.php';
        
    } elseif ($action == 'save') {
        $result = $viewModel->addKategori($_POST['nama_kategori']);
        if ($result) {
            header('Location: index.php?entity=kategori&success=add');
        } else {
            header('Location: index.php?entity=kategori&error=add');
        }
        
    } elseif ($action == 'update') {
        $result = $viewModel->updateKategori($_GET['id'], $_POST['nama_kategori']);
        if ($result) {
            header('Location: index.php?entity=kategori&success=update');
        } else {
            header('Location: index.php?entity=kategori&error=update');
        }
        
    } elseif ($action == 'delete') {
        $result = $viewModel->deleteKategori($_GET['id']);
        if ($result) {
            header('Location: index.php?entity=kategori&success=delete');
        } else {
            header('Location: index.php?entity=kategori&error=delete_failed');
        }
    }
    
// Routing untuk entitas Penerbit
} elseif ($entity == 'penerbit') {
    $viewModel = new PenerbitViewModel();
    
    if ($action == 'list') {
        $penerbitList = $viewModel->getPenerbitList();
        require_once 'views/penerbit_list.php';
        
    } elseif ($action == 'add') {
        require_once 'views/penerbit_form.php';
        
    } elseif ($action == 'edit') {
        $penerbit = $viewModel->getPenerbitById($_GET['id']);
        require_once 'views/penerbit_form.php';
        
    } elseif ($action == 'save') {
        $result = $viewModel->addPenerbit($_POST['nama_penerbit'], $_POST['alamat']);
        if ($result) {
            header('Location: index.php?entity=penerbit&success=add');
        } else {
            header('Location: index.php?entity=penerbit&error=add');
        }
        
    } elseif ($action == 'update') {
        $result = $viewModel->updatePenerbit($_GET['id'], $_POST['nama_penerbit'], $_POST['alamat']);
        if ($result) {
            header('Location: index.php?entity=penerbit&success=update');
        } else {
            header('Location: index.php?entity=penerbit&error=update');
        }
        
    } elseif ($action == 'delete') {
        $result = $viewModel->deletePenerbit($_GET['id']);
        if ($result) {
            header('Location: index.php?entity=penerbit&success=delete');
        } else {
            header('Location: index.php?entity=penerbit&error=delete_failed');
        }
    }
}
?>