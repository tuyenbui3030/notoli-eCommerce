<?php
class Cart extends Controller {
    public $cart;
    public $prod;
    public function __construct() {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
    }

    //Thêm vào giỏ hàng
    public function InsertCart() {
        //Kiểm tra người dùng có login hay không
        if(isset($_SESSION['loggedIN'])) { 
            //Lấy thông tin của product muốn thêm vào giỏ hàng
            $prod_id = $_POST["product_id"];
            $data = $this->prod->SelectProduct($prod_id);
            $row = mysqli_fetch_array($data);
            $prod_title = $row["prod_title"];
            $prod_price = $row["prod_price"];
            $userID = $_SESSION["userID"];
            //Lấy ID giỏ hàng, nếu sản phẩm đã tồn tại
            $cartID = $this->cart->GetCartID($userID, $prod_id);
            if($cartID != "false") {
                $resultUpdateQuantityCart = $this->cart->UpdateQuantityCart($cartID, $cart_quantity = 1, $prod_price);
                if($resultUpdateQuantityCart == "true") {
                    exit("true");
                }
                exit("false");
            }
            //Thêm thông tin vào giỏ hàng
            $resultInsertCart = $this->cart->InsertCart($prod_id, $userID, $prod_title, $prod_price);
            if($resultInsertCart == "true") {
                exit("true");
            }
            exit("false");
        } else {
        // Không cho thêm vào giỏ hàng khi chưa login
            exit("noLogin");
        }
    }
    public function LoadCart() {
        if(isset($_SESSION["loggedIN"])) {
            $result = $this->cart->GetItemCart();
            $rowcount=mysqli_num_rows($result);
            print_r($rowcount);
            exit();
        }
        exit('null');
    }
    public function LoadMiniCart() {
        $result = $this->cart->GetItemCart();
        if(!isset($_SESSION["loggedIN"])) {
            exit("null");
        }
        $totalPrice = 0;
        $output = '
        <ul class="mini-cart__list dev-miniCart">';
        while($rows = mysqli_fetch_array($result)) {   
            $itemID = $rows['cart_id']; 
            $itemCartTitle = $rows['cart_prodTitle'];
            $itemCartQuantity = $rows['cart_quantity'];
            $itemUnitPrice = $rows['cart_price'] / $itemCartQuantity;
            $itemImage = $rows['prod_image'];
            $totalPrice = $totalPrice + $rows['cart_price'];           
            $output .= '
            <li class="mini-cart__product">
                <a href="" class="remove-from-cart remove" id="'.$itemID.'">
                    <i class="flaticon flaticon-cross"></i>
                </a>
                <div class="mini-cart__product__image">
                    <img src=./public/assets/img/products/'. $itemImage .' alt="products">
                </div>
                <div class="mini-cart__product__content">
                    <a class="mini-cart__product__title dev-title-cart" href="product-details.html">'. $itemCartTitle .'</a>
                    <span class="mini-cart__product__quantity">' . $itemCartQuantity . ' x ' . number_format($itemUnitPrice, 0, '', ',') . '₫ </span>
                </div>
            </li>';
        }
        $output .= '
        </ul>';
        $output .= '
        <div class="mini-cart__total">
            <span>Tổng tiền</span>
            <span class="ammount">' . number_format($totalPrice, 0, '', ',') . '₫</span>
        </div>';
        $output .= '
        <div class="mini-cart__buttons">
            <a href="cart" class="btn btn-fullwidth btn-bg-sand mb--20">Xem giỏ hàng</a>
            <a href="checkout" class="btn btn-fullwidth btn-bg-sand">Thanh toán</a>
        </div>';
        exit($output);
    }

    public function RemoveCart() {
        //Kiểm tra người dùng có login hay không
        $cart_id = $_POST["cart_id"];
        $resultRemoveCart = $this->cart->RemoveCart($cart_id);
        if($resultRemoveCart == "true") {
            exit("true");
        }
        exit("false");
    }
}
?>