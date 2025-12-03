<?php
//Napukaw, John Brent C.
//WD-203
//December 3, 2025

declare(strict_types = 1);
$dishes = [
    'Sweet Madame' => ['price' => 3.99, 'stock' => 25],
    'Mondstadt Hash Brown' => ['price' => 2.99, 'stock' => 30],
    'Adeptus Temptation' => ['price' => 15.99, 'stock' => 10],
];

$tax = 20;

function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

function get_tax_due (float $price, int $quantity, int $tax = 0): float
{
    return ($price * $quantity) * ($tax / 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teyvat Adventures-Functions Example</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h1>Mondstadt's Store</h1>
    <h2>Stock Control</h2>
    <table>
        <tr>
            <th>Dish</th>
            <th>Stock</th>
            <th>Re-order</th>
            <th>Total Value</th>
            <th>Tax Due</th>
        </tr>
        <?php foreach ($dishes as $product_name => $data) { ?> 
        <tr>
            <td><?= $product_name; ?></td>
            <td><?= $data['stock']; ?></td>
            <td><?= get_reorder_message($data['stock']); ?></td>
            <td>$<?= (get_total_value($data['price'], $data['stock'])); ?></td>
            <td>$<?= (get_tax_due($data['price'], $data['stock'], $tax)); ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php include 'includes/footer.php'; ?>
</body>
</html>