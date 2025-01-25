<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'connection.php';
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>
                        <a class='button' href='edit.php?id={$row['id']}'>Edit</a>
                        <a class='button' href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <a href="index.html" class="button">Back</a>
    </div>
</body>
</html>