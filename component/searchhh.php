<main>
<?php include './component/fillter.php'; ?>
<div class="product-container">
    <h3>
        <?php
        $page = (isset($_GET["page"])) ? $_GET["page"] : "TẤT CẢ SẢN PHẨM";
        if($page === 'search'){
            messGreen("Kết quả tìm kiếm: "); 
            ?>
            <span id="showNumSearch" style="color: green;">
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.getElementById('showNumSearch').innerHTML = document.getElementById('numSearch').value + " sản phẩm";
                    });
                </script>
            </span>
            <?php //HTML
        }else{
            echo ucfirst($page);
        }
        ?>
    </h3>
    <div id="product-list">
        <?php
        if(isset($products)){
            $numSearch = 0;
            foreach ($products as $product) :
            ?>
                <div class="product" data-filter="<?= $product['status'] ?>">
                    <a href="?page=details&id=<?= $product['id'] ?>">
                        <div class="product-image">
                            <img width="200px" src="./assets/image/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="information-product">
                            <div class="title"><?= $product['productName'] ?></div>
                            <div class="price">
                                <?php 
                                if($product['discount'] > 0){
                                    ?><del><?= $product['price'] ?> VNĐ</del><?php //HTML
                                    $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
                                    ?><span><?= number_format($price) ?> VNĐ</span><?php //HTML
                                }else{
                                    ?>
                                    <span><?= number_format($product['price']) ?> VNĐ</span>
                                    <?php //HTML
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php // HTML
            $numSearch ++;
            endforeach;
            ?><input type="hidden" id="numSearch" value="<?= $numSearch ?>"><?php //HTML
        }else{
            require_once './component/functionsHTML.php';
            messRed("Không có sản phẩm nào !!!");
        }
        ?>
    </div>
    <?php include './component/pagination-product.php' ?>
</div>
</main>