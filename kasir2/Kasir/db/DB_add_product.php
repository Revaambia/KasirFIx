<?php
session_start();
require_once('DB_connection.php');

if(isset($_POST['add_product'])){
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $jumlah = $_POST['jumlah'];
    $updated_at = $_POST['updated_at'];

    $kode_unik = bin2hex(openssl_random_pseudo_bytes(5));

    $stmt = $conn->prepare("INSERT INTO products (nama_produk, harga_produk, jumlah, kode_unik, updated_at ) VALUES (?, ?, ?, ?, ?)");
    if(!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param('siiss', $nama_produk, $harga_produk, $jumlah, $kode_unik, $updated_at);
    if(!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    if($stmt->affected_rows > 0){
        echo "Product added successfully";
    } else {
        echo "Failed to add product. Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header('Location: ../pages/kasir/manage_product.php');
    exit;
}
?>
