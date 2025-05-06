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
                        <a href="index.php">
                            <img src="./img/DShop.png" src="" class="header-logo-img">
                        </a>
                    </div>
                </div>
                <div class="header-middle-center">
                    <form method="post" class="form-search">
                        <span class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="search" class="form-search-input" placeholder="Tìm kiếm món ăn...">
                        <button type="submit" name="submit" class="form-search-btn" href='home-product.php?title'>
                            <?php if (isset($_POST['submit'])) {
                                    $item = $_POST["search"];
                                    echo "<script>window.open('home-product.php?title=$item','_self')</script>";
                                } 
                            ?>
                        </button>
                    </form>
                </div>
                <div class="header-middle-right">
                    <ul class="header-middle-right-list">
                        <li class="header-middle-right-item close">
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
                                <li><a id="login" href=""><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a></li>
                                <li><a id="signup" href=""><i class="fa-solid fa-user-plus"></i> Đăng ký</a></li>
                            </ul>
                        </li>
                        <li class="header-middle-right-item open">
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
                <li class="menu-list-item"><a href='' class="menu-link">Trang chủ</a></li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món chay' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món chay') echo 'active'; ?>">Món chay</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món mặn' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món mặn') echo 'active'; ?>" >Món mặn</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món lẩu' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món lẩu') echo 'active'; ?>">Món lẩu</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món ăn vặt' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món ăn vặt') echo 'active'; ?>">Món ăn vặt</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món tráng miệng' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món tráng miệng') echo 'active'; ?>">Món tráng miệng</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Nước uống' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Nước uống') echo 'active'; ?>">Nước uống</a>
                </li>
                <li class="menu-list-item">
                    <a href='home-product.php?category=Món khác' class="menu-link <?php if(isset($_GET['category']) && $_GET['category']=='Món khác') echo 'active'; ?>">Món khác</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Header End -->