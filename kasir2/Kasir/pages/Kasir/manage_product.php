<?php
session_start();
require_once('../../db/DB_connection.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /index.php');
    exit;
}

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/manage_product.css">
    <title>Shop</title>
    <style>


.box.form-box {
    background-color: #f9f9f9;
    padding: 20px;
    margin-bottom: 20px;
    width: 100%; /* Menjadikan box.form-box lebar 100% */
    box-sizing: border-box; /* Untuk mempertahankan padding dalam perhitungan lebar */
}

.box.form-box h1 {
    margin-bottom: 20px;
    font-size: 24px;
}

.form-container {
    margin-bottom: 20px;
}

form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px; /* Mengurangi margin bottom menjadi 10px */
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.btna {
    padding: 5px 10px;
    margin-right: 5px;
    background-color: #00ff00; /* Warna latar belakang hijau */
    color: #fff; /* Warna teks putih */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btna:hover {
    background-color: #00cc00; /* Warna latar belakang hijau saat hover */
}

.btnb {
    padding: 5px 10px;
    margin-right: 5px;
    background-color: #ff0000; /* Warna latar belakang merah */
    color: #fff; /* Warna teks putih */
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btnb:hover {
    background-color: #cc0000; /* Warna latar belakang merah saat hover */
}

.btnc {
    padding: 5px 10px;
    margin-right: 5px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btna:hover,
.btnb:hover,
.btnc:hover {
    background-color: #0056b3;
}



    </style>
</head>

<body>
<div class="container">
<div class="box form-box">
 

       <h1>Hello, <?php echo htmlspecialchars($_SESSION['nama']); ?>! Welcome to Product Management!</h1>
    </div>
</div>

    <div class="container">
    <div class="box form-box">
    <div class="form-container">
        <form action="../../db/DB_add_product.php" method="post">
           <label for="nama_produk">Product Name:</label>
            <input type="text" name="nama_produk" required>
            <br>
            <label for="harga_produk">Product Price:</label>
            <input type="number" name="harga_produk" required>
            <br>
           <label for="jumlah">Quantity:</label>
            <input type="number" name="jumlah" required>
            <br>
            <button type="submit" name="add_product" class="btn">Add Product</button>
        </form>
    </div>

    <table style="width: 100%; border-collapse: collapse; background-color: #e6e6fa;">
    <tr>
        <th style="width: 10%; border: 1px solid #6a5acd; text-align: center;">ID</th>
        <th style="width: 20%; border: 1px solid #6a5acd; text-align: center;">Product Name</th>
        <th style="width: 15%; border: 1px solid #6a5acd; text-align: center;">Product Price</th>
        <th style="width: 15%; border: 1px solid #6a5acd; text-align: center;">Quantity</th>
        <th style="width: 20%; border: 1px solid #6a5acd; text-align: center;">Terakhir di Update</th>
        <th style="width: 20%; border: 1px solid #6a5acd; text-align: center;">Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td style="border: 1px solid #6a5acd; text-align: center;"><?php echo $row['id']; ?></td>
        <td style="border: 1px solid #6a5acd; text-align: center;"><?php echo htmlspecialchars($row['nama_produk']); ?></td>
        <td style="border: 1px solid #6a5acd; text-align: center;">Rp. <?php echo number_format($row["harga_produk"]); ?></td>
        <td style="border: 1px solid #6a5acd; text-align: center;"><?php echo number_format($row['jumlah']); ?> pcs</td>
        <td style="border: 1px solid #6a5acd; text-align: center;"><?php echo date('d F Y H:i:s', strtotime($row['created_at'])); ?></td>
        <td class="action-buttons" style="border: 1px solid #6a5acd; text-align: center;">
            <form action="update_product.php" method="get">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button class="btna update-button" type="submit">Update</button>
            </form>
            <form action="../../db/DB_delete_product.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btnb delete-button" name="delete_product" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
            </form>
            <form action="../../db/DB_procces_checkout.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btnc checkout-button" name="checkout_product">Checkout</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>


        </div>
        </div>
        </div>
</body>
        
</html>