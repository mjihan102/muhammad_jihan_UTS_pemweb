<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            color: #3498db;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <?php
        require './config/db.php';

        if(isset($_GET['id'])) {
            $id = $_GET['id'];

        
            $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
            $row = mysqli_fetch_assoc($result);

            if(!$row) {
                echo "Produk tidak ditemukan!";
                exit;
            }

        
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];

                $update_query = "UPDATE products SET name='$name', price=$price WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update_query);

                if($update_result) {
                    echo "<p>Data produk berhasil diupdate.</p>";
                } else {
                    echo "<p class='error'>Gagal mengupdate data produk.</p>";
                }
            }
    ?>
            <h1>Edit Produk</h1>
            <form method="post" action="">
                <label for="name">Nama Produk:</label>
                <input type="text" name="name" value="<?=$row['name'];?>" required><br>

                <label for="price">Harga:</label>
                <input type="number" name="price" value="<?=$row['price'];?>" required><br>

                <input type="submit" name="submit" value="Update">
            </form>
    <?php
        } else {
            echo "<p class='error'>ID produk tidak valid.</p>";
        }
    ?>
</body>
</html>
