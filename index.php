<?php
include 'database.php';

$shops = fetchShops();
$categories = fetchCategories();
$products = fetchProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Cửa hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Thông tin Cửa hàng</h1>
    </header>

    <main>
        <!-- Thông tin cửa hàng -->
        <?php if (!empty($shops)): ?>
            <?php foreach ($shops as $shop): ?>
                <section class="shop-info">
                    <h2><?php echo htmlspecialchars($shop['name']); ?></h2>
                    <p>Địa chỉ: <?php echo htmlspecialchars($shop['address']); ?></p>
                    <p>Điện thoại: <?php echo htmlspecialchars($shop['phone']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($shop['email']); ?></p>
                    <p>Giờ làm việc: <?php echo htmlspecialchars($shop['working_hours']); ?></p>
                    <p>Mô tả: <?php echo htmlspecialchars($shop['description']); ?></p>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có thông tin cửa hàng.</p>
        <?php endif; ?>

        <!-- Danh mục -->
        <section>
            <h2>Danh mục</h2>
            <?php if (!empty($categories)): ?>
                <ul class="category-list">
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                            <p><?php echo htmlspecialchars($category['description']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Không có danh mục nào.</p>
            <?php endif; ?>
        </section>

        <!-- Sản phẩm -->
        <section>
            <h2>Sản phẩm</h2>
            <div class="product-grid">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <img src="./img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p>Giá: $<?php echo number_format(htmlspecialchars($product['price']), 0, ',', '.'); ?></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <script> 
        console.log('Hello')
    </script>
</body>
</html>
