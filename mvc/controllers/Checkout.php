<?php
class Checkout extends Controller {
    public function __construct() {
        $this->cart = $this->model("CartModel");
        $this->prod = $this->model("productModel");
        $this->check = $this->model("CheckoutModel");
    }
    public function Action() {
        if(isset($_SESSION["loggedIN"])) {
            $cart_user = $_SESSION["userID"];
            $this->view("MiniLayout", [
                "page"=>"CheckOut",
                //Item minicart
                "itemListCart"=>$this->cart->GetItemCart(),
                //Item đơn hàng
                "itemListOrder"=>$this->cart->GetItemCart(),

            ]);
        } else {
            $location = "./";
            header("Location: " . $location);
        }
    }
    public function ActionOrder() {
        //Lấy dữ liệu để insert cho bảng Orders
        $billing_name = $_POST["billing_name"];
        $billing_date  = date("Y-m-d");
        $billing_city = $_POST["billing_city"];
        $billing_state = $_POST["billing_state"];
        $billing_streetAddress = $_POST["billing_streetAddress"];
        $billing_phone = $_POST["billing_phone"];
        $billing_email = $_POST["billing_email"];
        $billing_orderNotes = $_POST["orderNotes"];
        $billing_amount = $this->check->GetPriceTotalCart();
        $billing_amount = json_decode($billing_amount);
        $billing_userID = $_SESSION["userID"];
        //Thực hiện tạo đơn hàng mới trong bảng Orders
        $resultOrders = $this->check->InsertOrders($billing_userID, $billing_name, $billing_date, $billing_email, $billing_phone, $billing_city, $billing_amount, $billing_orderNotes);
        //Thực hiện chi tiết đơn hàng trong bảng orderDetails
        if($resultIDOrder == 'true') { 
            $resultListOrder = $this->check->GetItemCart();
            $resultIDOrder = $this->check->GetLastRowOrder();
            while($rows = mysqli_fetch_array($resultListOrder)) {
                $order_id = $resultIDOrder;
                $product_id = $rows["cart_prodID"];
                $quantity = $rows["cart_quantity"];
                $unitPrice = $rows["cart_price"] / $quantity;
                $resultOrderDetails = $this->check->InsertOrderDetails($order_id, $product_id, $quantity, $unitPrice);
            }
        }
        $resultTotal = $this->check->DeleteCart();
    }
}