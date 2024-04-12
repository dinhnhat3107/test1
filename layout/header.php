<header>
    <div class="header-top">
        <div class="logo"><a href="?page=home">Online Express Supermarket</a></div>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <form method="POST" action="?page=search" class="search" onsubmit="return true">
            <input type="text" name="keyword" id="keyword" placeholder="Bạn muốn mua gì hôm nay?">
            <button name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <div class="bell-cart-user">
            <a href="?page=cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span id="quantityCart">
                    <?php
                    $db = require './config/database.php';
                    $newCartCtrl = new Cart_Controller($db);
                    echo $newCartCtrl->quantityCart();
                    ?>
                </span>
                <input type="hidden" id="quantityCartOld" value="<?= $newCartCtrl->quantityCart() ?>">
            </a>
            <?php
            if (isset($ss_role) && isset($ss_id)) { // Kiểm tra đã đăng nhập chưa
            ?>
                <div class="user">
                    <i class="fa-regular fa-user"></i>
                    <div class="profile-item">
                        <a href="?page=profile"><i class="fa-regular fa-user"></i> Hồ sơ</a>
                        <!-- NHỚ VALIDATE  -->
                        <?php
                        if ($ss_role === "admin" || $ss_role === "staff") {
                            ?><a href="?page=admin"><i class="fa-solid fa-screwdriver-wrench"></i> Quản trị</a><?php // HTML
                        }
                        ?>
                        <!-- NHỚ VALIDATE  -->
                        <a href="./auth/?action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                    </div>
                </div>
            <?php //HTML
            }else{
            ?><a href="./auth/?action=logout"><i class="fa-regular fa-user"></i></a><?php // HTML
            }
            ?>
        </div>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
        <form method="POST" action="?page=search" class="search search-mobile" onsubmit="return true">
            <input type="text" name="keyword" id="keyword_mobile" placeholder="What do you want to buy today?">
            <button name="search" id="search_mobile"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
    </div>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
    <nav>
        <ul class="menu">
            <li class="menu-item">
                <a href="?page=home">Trang chủ</a>
            </li>
            <li class="menu-item">
                <a href="?page=about">Giới thiệu</a>
            </li>
            <li class="menu-item">
                <a href="?page=shop">Cửa hàng</a>
            </li>
            <li class="menu-item">
                <a href="?page=fillter&categoryId=122">Đồ uống</a>
            </li>
            <li class="menu-item">
                <a href="?page=fillter&categoryId=123">Gia vị</a>
            </li>
            <li class="menu-item">
                <a href="?page=fillter&categoryId=124">Trái cây</a>
            </li>
            <li class="menu-item">
                <a href="?page=fillter&categoryId=125">Rau củ</a>
            </li>
            <li class="menu-item">
                <a href="?page=contact">Liên hệ</a>
            </li>
        </ul>
    </nav>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
</header>