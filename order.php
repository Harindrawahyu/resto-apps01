<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare ("SELECT price FROM menu WHERE id = ?");
    $stmt->execute([$item_id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $total_price = $item['price'] * $quantity;

        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, item_id, quantity, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$customer_name, $item_id, $quantity, $total_price]);

        echo "<script>alert('Order placed successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Item not found.'); window.location.href='index.php';</script>";
    }
}
?>
