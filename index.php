<?php
    include("function.php");
    include("header.php");
?>


    <main class="main-wrapper">
        <div class="container" id="trangchu">
            <div class="home-slider">
                <img src="./img/banner-1.PNG" alt="">
            </div>
            <div class="home-service row" id="home-service">
                <div class="home-service-item col-12 col-sm-6 col-xl-3">
                    <div class="home-service-item-icon">
                        <i class="fa-solid fa-people-carry-box"></i>
                    </div>
                    <div class="home-service-item-content">
                        <h4 class="home-service-item-content-h">GIAO HÀNG NHANH</h4>
                        <p class="home-service-item-content-desc">Cho tất cả đơn hàng</p>
                    </div>
                </div>
                <div class="home-service-item col-12 col-sm-6 col-xl-3">
                    <div class="home-service-item-icon">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <div class="home-service-item-content">
                        <h4 class="home-service-item-content-h">SẢN PHẨM AN TOÀN</h4>
                        <p class="home-service-item-content-desc">Cam kết chất lượng</p>
                    </div>
                </div>
                <div class="home-service-item col-12 col-sm-6 col-xl-3">
                    <div class="home-service-item-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="home-service-item-content">
                        <h4 class="home-service-item-content-h">HỖ TRỢ 24/7</h4>
                        <p class="home-service-item-content-desc">Tất cả ngày trong tuần</p>
                    </div>
                </div>
                <div class="home-service-item col-12 col-sm-6 col-xl-3">
                    <div class="home-service-item-icon">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                    </div>
                    <div class="home-service-item-content">
                        <h4 class="home-service-item-content-h">HOÀN LẠI TIỀN</h4>
                        <p class="home-service-item-content-desc">Nếu không hài lòng</p>
                    </div>
                </div>
            </div>
            <div class="home-title-block" id="home-title">
        <h2 class="home-title">Khám phá thực đơn của chúng tôi</h2>
        </div>
            <div class="home-products" id="home-products">
                <?php
                    $per_page = 12;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $start_from = ($page - 1) * $per_page;
                    $get_products = "select * from products LIMIT $start_from,$per_page";
                    $run_products = mysqli_query($db, $get_products);

                    while($row_products = mysqli_fetch_array($run_products)) {
                        $id = $row_products['id'];
                        $title = $row_products['title'];
                        $price = $row_products['price'];
                        $img = $row_products['img'];
                        $description = $row_products['description'];

                        echo "
                            <div class='col-product'>
                                <article class='card-product'>
                                    <div class='card-header'>
                                        <a href='javascript:void(0);' class='card-image-link' onclick='detailProduct($id)'>
                                            <img class='card-image' src='$img' alt='$title'>
                                        </a>
                                    </div>
                                    <div class='food-info'>
                                        <div class='card-content'>
                                            <div class='product-card-title'>
                                                <a href='javascript:void(0);' class='card-title-link'  onclick='detailProduct($id)'>$title</a>
                                            </div>
                                        </div>
                                        <div class='product-card-footer'>
                                            <div class='product-price'>
                                                <span class='current-price'>" . wpshare247_format_money($price) . "</span>
                                            </div>
                                        </div>
                                        <div class='product-buy'>
                                            <button class='card-button order-item' onclick='detailProduct($id)'>
                                                <i class='fa-solid fa-cart-shopping'></i> 
                                                Đặt món
                                            </button>
                                        </div> 
                                    </div>
                                </article>
                            </div>
                        ";
                    }
                ?>

            </div>
            <div class="page-nav">
                <ul class="page-nav-list">
                    <?php

                        $query = "select * from products";
                        $result = mysqli_query($db, $query);

                        $total_records = mysqli_num_rows($result);

                        $total_pages = ($total_records / $per_page);

                        $total_pages = ceil($total_pages);

                        if ($total_pages <= 1) {
                            echo "";
                        } else {

                            for ($i = 1; $i <= $total_pages; $i++) {
                                $active = '';
                                if(isset($_GET['page']) && $_GET['page'] == $i) {
                                    $active = 'active';
                                }
                                else if(!isset($_GET['page']) && $i == 1) {
                                    $active = 'active'; 
                                }
                                echo "
                                    <li class='page-nav-item $active'>
                                        <a href='home-product.php?page=" . $i . "'>
                                            " . $i . "</a>
                                    </li>
                                ";
                            }
                        } 
                    ?>
                </ul>
            </div>
        </div>
        <!-- <div class="container" id="account-user">
            <div class="main-account">
                <div class="main-account-header">
                    <h3>Thông tin tài khoản của bạn</h3>
                    <p>Quản lý thông tin để bảo mật tài khoản</p>
                </div>
                <div class="main-account-body">
                    <div class="main-account-body-col">
                        <form action="" class="info-user">
                            <div class="form-group">
                                <label for="infoname" class="form-label">Họ và tên</label>
                                <input class="form-control" type="text" name="infoname" id="infoname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="infophone" class="form-label">Số điện thoại</label>
                                <input class="form-control" type="text" name="infophone" id="infophone" disabled="true"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="infoemail" class="form-label">Email</label>
                                <input class="form-control" type="email" name="infoemail" id="infoemail"
                                    placeholder="Thêm địa chỉ email của bạn">
                                <span class="inforemail-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="infoaddress" class="form-label">Địa chỉ</label>
                                <input class="form-control" type="text" name="infoaddress" id="infoaddress"
                                    placeholder="Thêm địa chỉ giao hàng của bạn">
                            </div>
                        </form>
                    </div>
                    <div class="main-account-body-col">
                        <form action="" class="change-password">
                            <div class="form-group">
                                <label for="" class="form-label w60">Mật khẩu hiện tại</label>
                                <input class="form-control" type="password" name="" id="password-cur-info"
                                    placeholder="Nhập mật khẩu hiện tại">
                                <span class="password-cur-info-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label w60">Mật khẩu mới </label>
                                <input class="form-control" type="password" name="" id="password-after-info"
                                    placeholder="Nhập mật khẩu mới">
                                <span class="password-after-info-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label w60">Xác nhận mật khẩu mới</label>
                                <input class="form-control" type="password" name="" id="password-comfirm-info"
                                    placeholder="Nhập lại mật khẩu mới">
                                <span class="password-after-comfirm-error form-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="main-account-body-row">
                        <div>
                            <button id="save-info-user" onclick="changeInformation()"><i
                                    class="fa-solid fa-floppy-disk"></i> Lưu thay đổi</button>
                        </div>
                        <div>
                            <button id="save-password" onclick="changePassword()"><i class="fa-solid fa-key"></i> Đổi
                                mật khẩu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="order-history">
            <div class="main-account">
                <div class="main-account-header">
                    <h3>Quản lý đơn hàng của bạn</h3>
                    <p>Xem chi tiết, trạng thái của những đơn hàng đã đặt.</p>
                </div>
                <div class="main-account-body">
                    <div class="order-history-section">
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <div class="modal product-detail">
        <button class="modal-close close-popup"><i class="fa-thin fa-xmark"></i></button>
        <div class="modal-container mdl-cnt" id="product-detail-content">
        </div>
    </div>
    <div class="modal signup-login">
        <div class="modal-container">
            <button class="form-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            <div class="forms mdl-cnt">
                <div class="form-content sign-up">
                    <h3 class="form-title">
                        Đăng ký tài khoản
                    </h3>
                    <p class="form-description">Đăng ký thành viên để mua hàng và nhận những ưu đãi đặc biệt từ chúng
                        tôi </p>
                    <form action="" class="signup-form">
                        <div class="form-group">
                            <label for="fullname" class="form-label">Tên đầy đủ</label>
                            <input id="fullname" name="fullname" type="text" placeholder="VD: Nhật Sinh"
                                class="form-control">
                            <span class="form-message-name form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại"
                                class="form-control">
                            <span class="form-message-phone form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu"
                                class="form-control">
                            <span class="form-message-password form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                            <input id="password_confirmation" name="password_confirmation"
                                placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                            <span class="form-message-password-confi form-message"></span>
                        </div>
                        <div class="form-group">
                            <input class="checkbox" name="checkbox" required="" type="checkbox" id="checkbox-signup">
                            <label for="checkbox-signup" class="form-checkbox">Tôi đồng ý với <a href="#"
                                    title="chính sách trang web" target="_blank">chính sách trang web</a></label>
                            <p class="form-message-checkbox form-message"></p>
                        </div>
                        <button class="form-submit" id="signup-button">Đăng ký</button>
                    </form>
                    <p class="change-login">Bạn đã có tài khoản ? <a href="javascript:;" class="login-link">Đăng nhập
                            ngay</a></p>
                </div>
                <div class="form-content login">
                    <h3 class="form-title">Đăng nhập tài khoản</h3>
                    <p class="form-description">Đăng nhập thành viên để mua hàng và nhận những ưu đãi đặc biệt từ chúng
                        tôi</p>
                    <form action="" class="login-form">
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input id="phone-login" name="phone" type="text" placeholder="Nhập số điện thoại"
                                class="form-control">
                            <span class="form-message phonelog"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input id="password-login" name="password" type="password" placeholder="Nhập mật khẩu"
                                class="form-control">
                            <span class="form-message-check-login form-message"></span>
                        </div>
                        <button class="form-submit" id="login-button">Đăng nhập</button>
                    </form>
                    <p class="change-login">Bạn chưa có tài khoản ? <a href="javascript:;" class="signup-link">Đăng kí
                            ngay</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-cart">
        <div class="cart-container">
            <div class="cart-header">
                <h3 class="cart-header-title"><i class="fa-solid fa-basket-shopping-simple"></i> Giỏ hàng</h3>
                <button class="cart-close" onclick="closeCart()"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            </div>
            <div class="cart-body">
                <div class="gio-hang-trong">
                    <i class="fa-thin fa-cart-xmark"></i>
                    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                </div>
                <ul class="cart-list">
                </ul>
            </div>
            <div class="cart-footer">
                <div class="cart-total-price">
                    <p class="text-tt">Tổng tiền:</p>
                    <p class="text-price">0đ</p>
                </div>
                <div class="cart-footer-payment">
                    <button class="them-mon"><i class="fa-solid fa-plus"></i> Thêm món</button>
                    <button class="thanh-toan disabled">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal detail-order">
        <div class="modal-container mdl-cnt">
            <h3 class="modal-container-title">Thông tin đơn hàng</h3>
            <button class="form-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            <div class="detail-order-content">
            </div>
        </div>
    </div> -->
    
    <?php
        include('footer.php');
    ?>
<!-- <script>alert("This is javascript code");</script> -->
</body> 

</html>