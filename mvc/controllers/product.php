<?php
class Product extends Controller{
    public function __construct() {
        $this->prod = $this->model("productModel");
        $this->cart = $this->model("CartModel");
    }
    public function Action() {
        $this->view("MiniLayout", [
            "page"=>"Product",
            //Item minicart
            "itemListCart"=>$this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder"=>$this->cart->GetItemCart(),
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct"=>$this->prod->SelectAllProduct(),
            //Show danh sách hãng sản phẩm
            "listBrand"=>$this->prod->SelectBrand(),

        ]);
    }
    public function Detail($id = NULL) {
        if($id == NULL) {
            $this->view("MiniLayout", [
                "page"=>"404",
                //Item minicart
                "itemListCart"=>$this->cart->GetItemCart(),
                //Item đơn hàng
                "itemListOrder"=>$this->cart->GetItemCart(),
            ]);
            exit();
        }
        $this->prod->UpView($id);
        $this->view("MiniLayout", [
            "page"=>"Detail",
            //Item minicart
            "itemListCart"=>$this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder"=>$this->cart->GetItemCart(),
            //Item chi tiết sản phẩm
            "itemDetails"=>$this->prod->ShowDetailsProduct($id),
            //List Item hình ảnh của chi tiết sản phẩm
            "listPhotoDetails"=>$this->prod->ShowListPhoto($id),
            //Số lượng đã bán
            "itemSold"=>$this->prod->GetSold($id),
            //Lấy tên hãng sản phẩm
            "titleBrand"=>$this->prod->GetTitleBrand($id),
            //Hiển thị 5 sản phẩm
            "showFiveProduct"=>$this->prod->ShowFiveProduct($id)
        ]);
    }
}
?>