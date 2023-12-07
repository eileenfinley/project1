<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>
<body>
    <?=template_header('Products')?>

    <?php
        // The amounts of products to show on each page
        $num_products_on_each_page = 4;
        // The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
        $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
        // Select products ordered by the date added
        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');
        // bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
        $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
        $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
        $stmt->execute();
        // Fetch the products from the database and return the result as an Array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_products = $pdo->query('SELECT * FROM products')->rowCount();
    ?>

    <?=template_footer()?>

</body>
</html>