<?php
session_start();
if(isset($_SESSION["user"])){
    $ss_role = (isset($_SESSION["user"])) ? $_SESSION["user"]['role'] : "" ;
    $ss_id = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "" ;
}
define("PAGE", (isset($_GET["page"])) ? $_GET["page"] : ""); 
define("ACTION", (isset($_GET["action"])) ? $_GET["action"] : "");
define("CATEGORY", (isset($_GET["category"])) ? $_GET["category"] : "") ;
include './component/functionsHTML.php';
/* ---------------------------------- AUTOLOAD --------------------------------- */
include './vendor/autoload.php';
/* ---------------------------------- AUTOLOAD --------------------------------- */
/* --------------------------------- HEADER --------------------------------- */
if(PAGE === 'admin'){
    // ADMIN
}else{
    include './layout/header.php';
}
/* --------------------------------- HEADER --------------------------------- */
$db = require './config/database.php';
$userController = new User_Controller($db);
$productController = new Product_Controller($db);
$categoryController = new Category_Controller($db);
$cartController = new Cart_Controller($db);
$orderController = new Order_Controller($db);
/* -------------------------------- VIEW MAIN (ROUTER) ------------------------------- */
if(!empty(PAGE)){
    if(PAGE === 'home'){ // trang chủ
        include './views/home.php';
    }elseif(PAGE === 'about'){ // trang giới thiệu
        include './views/about.php';
    }elseif(PAGE === 'details'){ // trang chi tiết sản phẩm
        $productController->detailsProductWeb();
    }elseif(PAGE === 'cart'){ // trang giỏ hàng
        $cartController->showCartList();
    }elseif(PAGE === 'checkout'){ // trang thanh toán
        $cartController->showCartListPageCheckout();
    }elseif(PAGE === 'contact'){ // trang liên hệ
        include './views/contact.php';
    }elseif(PAGE === 'profile'){ // trang hồ sơ
        $userController->showInformationOneUser();
    }elseif(PAGE === 'shop'){ // trang cửa hàng
        include './views/shop.php';
    }elseif(PAGE === 'search'){ // trang tìm kiếm
        $productController->searchhh();
    }elseif(PAGE === 'admin'){ // trang admin
        header("Location: ./admin/?room=statistical");
    }elseif(PAGE === 'fillter'){ // trang lọc sản phẩm nav
        include './views/shop-fillter.php';
    }
    // NOT FOUND
    else{
        ?><script>window.location = './404/'</script><?php
    }
    // NOT FOUND
}else{ 
    include './views/home.php';
}
/* -------------------------------- VIEW MAIN (ROUTER) ------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
if(ACTION === 'cancel-order'){ // hủy đơn hàng
    $orderController->cancelOrder();
}
/* --------------------------------- ACTION --------------------------------- */
/* --------------------------------- LOADING -------------------------------- */
include './component/loading.php';
/* --------------------------------- LOADING -------------------------------- */
/* --------------------------------- FOOTER --------------------------------- */
if(PAGE === 'admin'){ // nếu là trang admin thì ko cần footer
    // ADMIN
}else{
    include './layout/footer.php';
}
/* --------------------------------- FOOTER --------------------------------- */
?>