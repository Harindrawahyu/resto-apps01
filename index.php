<!DOCTYPE html>
<html>
<head>
    <title>Fast Food Ordering System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-dark" href="#">Fast Food Express</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center text-dark mb-4">Our Delicious Menu</h1>
        <div class="row g-4">
            <?php
            include 'config.php';
            $stmt = $pdo->query("SELECT * FROM menu");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='col-md-4'>
                        <div class='card shadow-sm p-3'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>{$row['name']}</h5>
                                <p class='card-text'>Price: \${$row['price']}</p>
                                <form action='order.php' method='POST'>
                                    <input type='hidden' name='item_id' value='{$row['id']}'>
                                    <input type='number' name='quantity' value='1' min='1' class='form-control mb-2'>
                                    <input type='text' name='customer_name' placeholder='Your Name' class='form-control mb-2' required>
                                    <button type='submit' class='btn btn-primary w-100'>Order Now</button>
                                </form>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>