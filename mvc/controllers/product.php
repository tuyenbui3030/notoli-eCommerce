<?php
class Product extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->prod = $this->model("productModel");
        $this->cart = $this->model("CartModel");
    }
    public function Action()
    {
        $this->view("MiniLayout", [
            "page" => "Product",
            //Item minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder" => $this->cart->GetItemCart(),
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct" => $this->prod->SelectAllProduct(),
            //Show danh sách hãng sản phẩm
            "listBrand" => $this->prod->SelectBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh) cho phần filter
            "filterCategories" => $this->prod->ShowListCategories(),
            //Giá bán cao nhất (Dùng cho lọc giá);
            "maxPrice" => $this->prod->GetMaxPrice(),
        ]);
    }
    public function Detail($id = NULL)
    {
        if ($id == NULL) {
            $this->view("MiniLayout", [
                "page" => "404",
                //Item minicart
                "itemListCart" => $this->cart->GetItemCart(),
                //Item đơn hàng
                "itemListOrder" => $this->cart->GetItemCart(),
                //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
                "listCategories" => $this->prod->ShowListCategories(),
                //Lấy danh sách nhà sản xuất (Rolex, Apple)
                "listBrands" => $this->prod->ShowListBrand(),
            ]);
            exit();
        }
        $this->prod->UpView($id);
        $this->view("MiniLayout", [
            "page" => "Detail",
            //Item minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder" => $this->cart->GetItemCart(),
            //Item chi tiết sản phẩm
            "itemDetails" => $this->prod->ShowDetailsProduct($id),
            //List Item hình ảnh của chi tiết sản phẩm
            "listPhotoDetails" => $this->prod->ShowListPhoto($id),
            //Số lượng đã bán
            "itemSold" => $this->prod->GetSold($id),
            //Lấy tên hãng sản phẩm
            "titleBrand" => $this->prod->GetTitleBrand($id),
            //Hiển thị 5 sản phẩm
            "showFiveProduct" => $this->prod->ShowFiveProduct($id),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
        ]);
    }
    public function categories($cat_id)
    {
        $this->view("MiniLayout", [
            "page" => "Product",
            //Item minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder" => $this->cart->GetItemCart(),
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct" => $this->prod->ProductOfCategories($cat_id),
            //Show danh sách hãng sản phẩm
            "listBrand" => $this->prod->SelectBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh) cho phần filter
            "filterCategories" => $this->prod->ShowListCategories(),
            //Giá bán cao nhất (Dùng cho lọc giá);
            "maxPrice" => $this->prod->GetMaxPrice(),
        ]);
    }
    public function brands($brand_id)
    {
        $this->view("MiniLayout", [
            "page" => "Product",
            //Item minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder" => $this->cart->GetItemCart(),
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct" => $this->prod->ProductOfBrands($brand_id),
            //Show danh sách hãng sản phẩm
            "listBrand" => $this->prod->SelectBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh) cho phần filter
            "filterCategories" => $this->prod->ShowListCategories(),
            //Giá bán cao nhất (Dùng cho lọc giá);
            "maxPrice" => $this->prod->GetMaxPrice(),
        ]);
    }
    public function search()
    {
        // $posts = $this->request->getQuery('aaaa');
        // print_r($posts);
        // exit;
        // print_r($_GET);
        // exit;
        // $itemSearch = $_SERVER['REQUEST_URI'];
        // // print_r($_REQUEST);
        // // exit();
        // $array = array();
        // $array = explode('search?popup-search=', $itemSearch);
        // $itemSearch =  $array[1];
        // $itemSearch = $_GET["popup-search"];
        $itemSearch = $this->request->getQuery('popup-search');
        // echo $itemSearch;
        // exit;
        // $itemSearch = urldecode($itemSearch);
        // $itemSearch = str_replace('d', 'đ', $itemSearch);
        $this->view("MiniLayout", [
            "page" => "Product",
            //Item minicart
            "itemListCart" => $this->cart->GetItemCart(),
            //Item đơn hàng
            "itemListOrder" => $this->cart->GetItemCart(),
            //Show toàn bộ sản phẩm ra trang sản phẩm
            "allProduct" => $this->prod->SearchProduct($itemSearch),
            //Show danh sách hãng sản phẩm
            "listBrand" => $this->prod->SelectBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh)
            "listCategories" => $this->prod->ShowListCategories(),
            //Lấy danh sách nhà sản xuất (Rolex, Apple)
            "listBrands" => $this->prod->ShowListBrand(),
            //Lấy danh sách loại sản phẩm (Đồng hồ thời trang, đồng hồ thông minh) cho phần filter
            "filterCategories" => $this->prod->ShowListCategories(),
            //Giá bán cao nhất (Dùng cho lọc giá);
            "maxPrice" => $this->prod->GetMaxPrice(),
        ]);
    }
}
