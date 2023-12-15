<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <?php
        // Get the 4 most recently added products
        $stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
        $stmt->execute();
        $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?=template_header('Home')?>

    <div class="featured">
        <h2>The Ultimate Gear</h2>
        <p>Everything you need for Ultimate</p>
    </div>
    <div class="recentlyadded content-wrapper">
        <h2>Products</h2>
        <div class="products">
            <?php foreach ($recently_added_products as $product): ?>
            <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
                <img src="<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                <span class="name"><?=$product['name']?></span>
                <span class="price">
                    &dollar;<?=$product['rrp']?>
                    <?php if ($_SESSION['username'] && $product['rrp'] > 0): ?>
                        <span class="rrp">&dollar;<?=$product['price']?></span>
                    <?php endif; ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?=template_footer()?>
</body>
</html>