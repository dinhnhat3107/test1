<?php
$db = include './config/database.php';
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
?>
<main>
    <article>
        <?php include './layout/banner.php' ?>
        <?= $productController->showProductByStatusLimit("SẢN PHẨM BÁN CHẠY",'hot', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
        <?= $productController->showProductByStatusLimit("SẢN PHẨM MỚI NHẤT",'new', 10) ?>
        <div class="view-more"><button onclick="window.location.href = '?page=shop'">Xem tất cả</button></div>
        <?php include './component/more-home.php' ?>
    </article>
</main>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->
<script src="./assets/javascript/filter-product.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ------------------------------- JAVASCRIPT ------------------------------- */ -->