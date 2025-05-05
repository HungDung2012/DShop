<?php
    $db = mysqli_connect('localhost', 'root', '', 'restaurant_management');
    
// Chuyển định dạng tiền 
function wpshare247_get_currency(){
    return '₫';
}
function wpshare247_format_money($amount, $currency=false){
    
    return number_format($amount, 0, '.', '.'). ''. wpshare247_get_currency();
    
   
}

function getMProduct()
{
    global $db;

    $get_products = "select * from products";
    $run_products = mysqli_query($db, $get_products);



    for($x = 0; $x < 12; $x++) {
        $row_products = mysqli_fetch_array($run_products);
        $id = $row_products['id'];
        $title = $row_products['title'];
        $price = $row_products['price'];
        $img = $row_products['img'];

        echo "
            <div class='col-product'>
                <article class='card-product'>
                    <div class='card-header'>
                        <a href='#' class='card-image-link'>
                            <img class='card-image' src='$img' alt='$title'>
                        </a>
                    </div>
                    <div class='food-info'>
                        <div class='card-content'>
                            <div class='product-card-title'>
                                <a href='#' class='card-title-link'>$title</a>
                            </div>
                        </div>
                        <div class='product-card-footer'>
                            <div class='product-price'>
                                <span class='current-price'>" . wpshare247_format_money($price) . "</span>
                            </div>
                        </div>
                        <div class='product-buy'>
                            <button class='card-button order-item'>
                                <i class='fa-solid fa-cart-shopping'></i> 
                                Đặt món
                            </button>
                        </div> 
                    </div>
                </article>
            </div>
        ";
    }
}


// Phân trang
$perPage = 12;
$currPage = 1;

function displayList()
{

}


// <?php
//     $db = mysqli_connect('localhost', 'root', '', 'restaurant_management');
    
// // Chuyển định dạng tiền 
// function wpshare247_get_currency(){
//     return '₫';
// }
// function wpshare247_format_money($amount, $currency=false){
    
//     return number_format($amount, 0, '.', '.'). ''. wpshare247_get_currency();
    
   
// }

// // Hiển thị đồ ăn
// $get_products = "select * from products";

// function getMProduct($productShow)
// {

//     $row_products = mysqli_fetch_array($run_products);
//     foreach ($productShow as $x) {

//         $id = $x['id'];
//         $title = $x['title'];
//         $price = $x['price'];
//         $img = $x['img'];

//         echo "
//             <div class='col-product'>
//                 <article class='card-product'>
//                     <div class='card-header'>
//                         <a href='#' class='card-image-link'>
//                             <img class='card-image' src='$img' alt='$title'>
//                         </a>
//                     </div>
//                     <div class='food-info'>
//                         <div class='card-content'>
//                             <div class='product-card-title'>
//                                 <a href='#' class='card-title-link'>$title</a>
//                             </div>
//                         </div>
//                         <div class='product-card-footer'>
//                             <div class='product-price'>
//                                 <span class='current-price'>" . wpshare247_format_money($price) . "</span>
//                             </div>
//                         </div>
//                         <div class='product-buy'>
//                             <button class='card-button order-item'>
//                                 <i class='fa-solid fa-cart-shopping'></i> 
//                                 Đặt món
//                             </button>
//                         </div> 
//                     </div>
//                 </article>
//             </div>
//         ";
//     }
// }


// // Phân trang
// $perPage = 12;
// $currPage = 1;

// function displayList()
// {
//     $start = ($currPage - 1) * $perPage;
//     $end = ($currPage - 1) * $perPage + $perPage;
//     $productShow = productAll.slice(start, end);
//     getMProduct($productShow);
// }
