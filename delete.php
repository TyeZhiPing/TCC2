<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Product deleted successfully!</p>";
    } else {
        echo "<p>Error deleting product: " . $conn->error . "</p>";
    }
}
header('Location: view.php');
?>