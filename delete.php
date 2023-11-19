<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .message-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
        }

        .success {
            color: #27ae60;
        }

        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
            require './config/db.php';

            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                
                $delete_query = "DELETE FROM products WHERE id=$id";
                $delete_result = mysqli_query($db_connect, $delete_query);

                if($delete_result) {
                    echo "<p class='success'>Data produk berhasil dihapus.</p>";
                } else {
                    echo "<p class='error'>Gagal menghapus data produk.</p>";
                }
            } else {
                echo "<p class='error'>ID produk tidak valid.</p>";
            }
        ?>
    </div>
</body>
</html>
