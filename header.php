<!-- <?php
    include('db.php');
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DShop</title>
    <link href='./img/favicon.png' rel='icon' type='image/x-icon' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" >


</head>

<body>

    <!-- Header Section -->

    <header>
        <div class="header-middle">
            <div class="container">
                <div class="header-middle-left">
                    <div class="header-logo">
                        <a href="">
                            <img src="./img/DShop.png" alt="" class="header-logo-img">
                        </a>
                    </div>
                </div>
                <div class="header-middle-center">
                    <form action="" class="form-search">
                        <span class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-search-input" placeholder="Tìm kiếm món ăn..."
                            oninput="searchProducts()">
                        <button class="filter-btn"><i class="fa-solid fa-filter"></i><span>Lọc</span></button>
                    </form>
                </div>
                <div class="header-middle-right">
                    <ul class="header-middle-right-list">
                        <li class="header-middle-right-item close" onclick="closeSearchMb()">
                            <div class="cart-icon-menu">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </li>
                        <li class="header-middle-right-item dropdown open">
                            <i class="fa-solid fa-user"></i>
                            <div class="auth-container">
                                <span class="text-dndk">Đăng nhập / Đăng ký</span>
                                <span class="text-tk">Tài khoản <i class="fa-sharp fa-solid fa-caret-down"></i></span>
                            </div>
                            <ul class="header-middle-right-menu">
                                <li><a id="login" href="javascript:;"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a></li>
                                <li><a id="signup" href="javascript:;"><i class="fa-solid fa-user-plus"></i> Đăng ký</a></li>
                            </ul>
                        </li>
                        <li class="header-middle-right-item open" onclick="openCart()">
                            <div class="cart-icon-menu">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <span class="count-product-cart">0</span>
                            </div>
                            <span>Giỏ hàng</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <nav class="header-bottom">
        <div class="container">
            <ul class="menu-list">
                <li class="menu-list-item"><a href="" class="menu-link">Trang chủ</a></li>
                <li class="menu-list-item" onclick="showCategory('Món chay')"><a href="javascript:;" class="menu-link">Món chay</a></li>
                <li class="menu-list-item" onclick="showCategory('Món mặn')"><a href="javascript:;" class="menu-link">Món mặn</a></li>
                <li class="menu-list-item" onclick="showCategory('Món lẩu')"><a href="javascript:;" class="menu-link">Món lẩu</a></li>
                <li class="menu-list-item" onclick="showCategory('Món ăn vặt')"><a href="javascript:;" class="menu-link">Món ăn vặt</a></li>
                <li class="menu-list-item" onclick="showCategory('Món tráng miệng')"><a href="javascript:;" class="menu-link">Món tráng miệng</a></li>
                <li class="menu-list-item" onclick="showCategory('Nước uống')"><a href="javascript:;" class="menu-link">Nước uống</a></li>
                <li class="menu-list-item" onclick="showCategory('Món khác')"><a href="javascript:;" class="menu-link">Món khác</a></li>
            </ul>
        </div>
    </nav>


    <!-- Header End -->