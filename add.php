<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>
        <form action="add.php" method="POST" class="form-layout">
            <table class="form-table">
                <tr>
                    <td><label for="name">Product Name:</label></td>
                    <td>
                        <select id="name" name="name" required class="input">
                            <option value="Laptop">Laptop</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Monitor">Monitor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="quantity">Quantity:</label></td>
                    <td><input type="number" id="quantity" name="quantity" min="0" required class="input"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="button">Add</button>
                        <a href="index.html" class="button">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        include 'connection.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];

            if ($quantity >= 0) {
                $sql = "INSERT INTO products (name, quantity) VALUES ('$name', '$quantity')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Product added successfully!</p>";
                } else {
                    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>Quantity cannot be negative.</p>";
            }
        }
        ?>
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