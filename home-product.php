<?php
    include("function.php");
    include("header.php");
?>
    <div class="container" id="trangchu">
        <div class="home-title-block" id="home-title" style="margin-top: 70px">
            <h2 class="home-title">Khám phá thực đơn của chúng tôi</h2>
        </div>
        <div class="home-products" id="home-products">
            <?php
                if (isset($_GET['page'])){
    
                    // Phân trang

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
                } else if(isset($_GET['category'])){

                    // Loại thực phẩm

                    $category = $_GET['category'];
                    $per_page = 12;
                    $page = 1;
                    

                    $start_from = ($page - 1) * $per_page;
                    $get_products = "SELECT * FROM products WHERE category = '$category' LIMIT $start_from,$per_page";
                    $run_products = mysqli_query($db, $get_products);

                    while($row_products = mysqli_fetch_array($run_products)) {
                        $id = $row_products['id'];
                        $title = $row_products['title'];
                        $price = $row_products['price'];
                        $img = $row_products['img'];

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
                } else if (isset($_GET['title'])) {

                    // Tìm kiếm theo từ

                    $item = $_GET['title'];
        
                    $get_product = "select * from products where title LIKE '%$item%'";
        
                    $run_product = mysqli_query($db, $get_product);
        
                    $count = mysqli_num_rows($run_product);
                    
                    if ($count > 0) {
                        
                        
                        while($row_products = mysqli_fetch_array($run_product)) {
                            $id = $row_products['id'];
                            $title = $row_products['title'];
                            $price = $row_products['price'];
                            $img = $row_products['img'];
        
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
                        
        
                    } else {
                        echo "
                        <script>
                            alert('Không tìm thấy sản phẩm',);
                        </script>";
                    }
                }   
            ?>

        </div>
        <div class="page-nav">
            <ul class="page-nav-list">
                <?php
                    if(isset($_GET['category'])) {
                        $category = $_GET['category'];
                        $query = "SELECT * FROM products WHERE category = '$category'";
                            
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
                                        <a href='home-product.php?category=" . $category. "&page=" . $i . "'>
                                            " . $i . "</a>
                                    </li>
                                ";
                            }
                        }
                    } else if (isset($_GET['page'])) {
                        $query = "SELECT * FROM products";
                        
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
                    }
                    
                ?>
            </ul>
        </div>


    </div>

<?php
    include("footer.php");
?>
    