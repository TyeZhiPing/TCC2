<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <?php
        include 'connection.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM products WHERE id=$id");
            $product = $result->fetch_assoc();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];

            if ($quantity >= 0) {
                $sql = "UPDATE products SET name='$name', quantity='$quantity' WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Product updated successfully!</p>";
                    echo "<a href='view.php' class='button'>Back</a>";
                } else {
                    echo "<p class='error'>Error updating product: " . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>Quantity cannot be negative.</p>";
            }
        }
        ?>
        <?php if (isset($product)): ?>
        <form action="edit.php" method="POST" class="form-layout">
            <table class="form-table">
                <tr>
                    <td><label for="name">Product Name:</label></td>
                    <td>
                        <select id="name" name="name" required class="input">
                            <option value="Laptop" <?php echo ($product['name'] == 'Laptop') ? 'selected' : ''; ?>>Laptop</option>
                            <option value="Mouse" <?php echo ($product['name'] == 'Mouse') ? 'selected' : ''; ?>>Mouse</option>
                            <option value="Keyboard" <?php echo ($product['name'] == 'Keyboard') ? 'selected' : ''; ?>>Keyboard</option>
                            <option value="Monitor" <?php echo ($product['name'] == 'Monitor') ? 'selected' : ''; ?>>Monitor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="quantity">Quantity:</label></td>
                    <td><input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="0" required class="input"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="button">Update</button>
                        <a href="view.php" class="button">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>

<style>
.form-layout {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}
.form-table {
    margin: auto;
    border-collapse: separate;
    border-spacing: 10px;
}
.form-table td {
    padding: 5px;
}
label {
    margin-bottom: 5px;
    font-weight: bold;
}
.input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
}
.success {
    color: green;
    font-weight: bold;
    margin-top: 10px;
}
.error {
    color: red;
    font-weight: bold;
    margin-top: 10px;
}
</style>
