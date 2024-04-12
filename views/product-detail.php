<main>
    <article>
    <div id="product-details">
        <div class="image-pdts">
            <div class="image-main-pdts">
                <img id="imageMain" src="./assets/image/<?= $product['image'] ?>" alt="">
            </div>
        </div>
        <div class="information-pdts">
            <div class="infor-top">
                <div class="title-pdts">
                    <?= $product['productName'] ?>
                </div>
                <div class="quantity-sold-commment-pdts">
                    <span style="color: #F1C93B;"> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                    <span>978 số lượt thích</span>
                </div>
                <div class="price-pdts">
                    <?php 
                    if($product['discount'] > 0){
                        ?><span class="cost-pdts"><?= $product['price'] ?> VNĐ</span><?php //HTML
                    }
                    ?>
                    <span class="price-pdts-end">
                        <?php 
                            $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
                            ?><span><?= number_format($price) ?> VNĐ</span><?php //HTML
                        ?>
                    </span>
                </div>
                <!-- /* ------------------------------- ADD TO CART ------------------------------ */ -->
                <?php 
                    $db = require './config/database.php';
                    $productController = new Product_Controller($db);
                    $quantityOld = $productController->quantityOld($product['id']);
                    $quantity = $product['quantity'];
                    if($quantityOld !== $quantity){ // Kiểm tra xem hàng trong kho đã bán hết chưa
                        ?>
                        <form action="" method="POST" onsubmit="return false">
                            <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                            <input hidden type="number" readonly id="max-qtt" value="<?= $quantity - $quantityOld ?>">
                            <!-- /* -------------------------- SỐ LƯỢNG HÀNG TỒN KHO ------------------------- */ -->
                            <!-- /* -------------------------- SỐ LƯỢNG MAX BÊN CART ------------------------- */ -->
                            <input hidden type="number" readonly id="max-qtt-on-cart" value="<?= $quantityOnCart ?>">
                            <!-- /* -------------------------- SỐ LƯỢNG MAX BÊN CART ------------------------- */ -->
                            <div class="control-quantity">
                                <input type="hidden" id="productId" value="<?= (isset($_GET["id"])) ? $_GET["id"] : "" ?>">
                                <button type="button" id="down-qtt"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" value="1" id="quantity_add_cart">
                                <button type="button" id="up-qtt"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <button type="submit" id="buy-now" class="button-action-pdt">Mua ngay</button>
                            <button type="submit" id="add-to-cart" class="button-action-pdt">Thêm vào giỏ hàng</button>
                        </form>
                        <?php // HTML
                    }
                ?>
                <!-- /* ------------------------------- ADD TO CART ------------------------------ */ -->
            </div>
        </div>
    </div>
    <div class="infor-more">
        <div class="detais-description-pdts">
            <div class="title-details-description-pdts">
                Mô tả sản phẩm: <?= $product['productName'] ?>
            </div>
            <div class="content-details-description-pdts">
                <?= $product['description'] ?>
            </div>
            <div class="title-details-description-pdts">
                Chi tiết sản phẩm
            </div>
            <div class="content-details-description-pdts">
                <?= $product['details'] ?>
            </div>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
            <?php 
            $productController = new Product_Controller($db);
            $productController->showProductListByCategory($product['categoryId']);
            ?>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
    </div>
    </article>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/comment.js"></script>
<script src="./assets/javascript/delete-comment.js"></script>
<script src="./assets/javascript/add-to-cart.js"></script>
<script src="./assets/javascript/quantity-actions.js"></script>
<script src="./assets/javascript/product-detail.js"></script>
<script src="./assets/javascript/search.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
