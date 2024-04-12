document.addEventListener("DOMContentLoaded", function () {
    let maxQtt = parseInt(document.getElementById("max-qtt").value);
    let maxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);
    var addToCart = document.getElementById("add-to-cart");
    var buyNow = document.getElementById("buy-now");
    var productId = document.getElementById("productId");
    var quantity = document.getElementById("quantity_add_cart");
    
    addToCart.addEventListener('click', () => {
        if (quantity.value > maxQtt) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm trong kho',
            });
        } else {
            let newMaxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);

            if ((parseInt(quantity.value) + maxQttOnCart) > maxQtt) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và giỏ hàng bạn đang có ' + maxQttOnCart + ' sản phẩm!',
                });
            } else {
                if (parseInt(quantity.value) + newMaxQttOnCart > maxQtt) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và giỏ hàng bạn đang có ' + newMaxQttOnCart + ' sản phẩm!',
                    });
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "./handles/add-to-cart.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            let result = xhr.responseText;
                            if (result === "Thành công") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Đã thêm vào giỏ hàng",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });

                                let quantityCartOld = parseInt(document.getElementById("quantityCartOld").value);
                                document.getElementById("quantityCart").innerText = quantityCartOld + 1;

                                document.getElementById("max-qtt-on-cart").value = parseInt(parseInt(quantity.value) + parseInt(document.getElementById("max-qtt-on-cart").value));
                            } else if (result === "Bạn chưa đăng nhập") {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Thông báo',
                                    text: 'Bạn chưa đăng nhập!',
                                    allowOutsideClick: false,
                                    confirmButtonText: "Đăng nhập"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = './auth/?auth=login';
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: result,
                                });
                            }
                        }
                    }
                    xhr.send("productId=" + productId.value + "&quantity=" + quantity.value );
                }
            }
        }
    });
    buyNow.addEventListener('click', () => {
        if (quantity.value > maxQtt) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm trong kho',
            });
        } else {
            let newMaxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value);

            if ((parseInt(quantity.value) + maxQttOnCart) > maxQtt) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và giỏ hàng bạn đang có ' + maxQttOnCart + ' sản phẩm!',
                });
            } else {
                if (parseInt(quantity.value) + newMaxQttOnCart > maxQtt) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Chỉ còn lại ' + maxQtt + ' sản phẩm và giỏ hàng bạn đang có ' + newMaxQttOnCart + ' sản phẩm!',
                    });
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "./handles/add-to-cart.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            let result = xhr.responseText;
                            if (result === "Thành công") {
                                window.location.href = '?page=checkout';
                            } else if (result === "Bạn chưa đăng nhập") {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Thông báo',
                                    text: 'Bạn chưa đăng nhập!',
                                    allowOutsideClick: false,
                                    confirmButtonText: "Đăng nhập"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = './auth/?auth=login';
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: result,
                                });
                            }
                        }
                    }
                    xhr.send("productId=" + productId.value + "&quantity=" + quantity.value);
                }
            }
        }
    });
});


