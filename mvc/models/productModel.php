<?php
class productModel extends DB
{
    //Show sản phẩm, trang chủ
    public function Product()
    {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    //Show top 12 sản phẩm mới nhất
    public function TopNew()
    {
        $qr = "SELECT * FROM products ORDER BY prod_date DESC LIMIT 12";
        return mysqli_query($this->con, $qr);
    }
    //Show top 12 sản phẩm bán chạy nhất
    public function TopHot()
    {
        $qr = "SELECT *, SUM(o.quantity) q FROM products p JOIN orderdetails o 
        ON p.prod_id = o.product_id
        WHERE p.prod_quantity > 0
        GROUP BY p.prod_id 
        ORDER BY q DESC 
        LIMIT 12";
        return mysqli_query($this->con, $qr);
    }
    //Tồn kho
    public function InStock($prod_id)
    {
        $qr = "SELECT prod_quantity FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows["prod_quantity"]);
    }
    //Show sản phẩm trang sản phẩm
    public function SelectAllProduct()
    {
        $qr = "SELECT * FROM products";
        return mysqli_query($this->con, $qr);
    }
    public function SelectProduct($prod_id)
    {
        $qr = "SELECT prod_title, prod_price FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Show hãng sản phẩm
    public function SelectBrand()
    {
        $qr = "SELECT * FROM brands";
        return mysqli_query($this->con, $qr);
    }
    //Show chi tiết sản phẩm
    public function ShowDetailsProduct($prod_id)
    {
        $qr = "SELECT * FROM products WHERE prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Hiện thị danh sách hình ảnh
    public function ShowListPhoto($prod_id)
    {
        $qr = "SELECT photo_name FROM photos WHERE photo_prod_id = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Cập nhật lượt xem
    public function UpView($prod_id)
    {
        $qr = "UPDATE `products` SET `prod_view` = `prod_view` + 1 WHERE `prod_id` = $prod_id";
        return mysqli_query($this->con, $qr);
    }
    //Lấy số lượng sản phẩm đã bán
    public function GetSold($prod_id)
    {
        $qr = "SELECT SUM(quantity) FROM orderdetails WHERE product_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }

    public function GetTitleBrand($prod_id)
    {
        $qr = "SELECT `brands`.`brand_title` FROM `brands` JOIN `products` ON `brands`.`brand_id` = `products`.`prod_brand` WHERE `products`.`prod_id` = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $rows =  mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }
    public function ShowFiveProduct($prod_id)
    {
        $qr = "SELECT prod_cat FROM products WHERE prod_id = $prod_id";
        $result = mysqli_query($this->con, $qr);
        $cat_id = mysqli_fetch_array($result);
        $cat_id = $cat_id[0];
        $qr = "SELECT prod_id, prod_title, prod_price, prod_image FROM `products` WHERE prod_cat = $cat_id ORDER BY RAND() LIMIT 5";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy danh sách loại sản phẩm
    public function ShowListCategories()
    {
        $qr = "SELECT * FROM `categories`";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy danh sách nhà sản xuất
    public function ShowListBrand()
    {
        $qr = "SELECT * FROM `brands`";
        $result = mysqli_query($this->con, $qr);
        return $result;
    }
    //Lấy toàn bộ sản phẩm theo 1 loại sản phẩm (VD: toàn bộ sản phẩm của đồng hồ thời trang)
    public function ProductOfCategories($cat_id)
    {
        $qr = "SELECT * FROM products WHERE prod_cat = $cat_id ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Lấy toàn bộ sản phẩm theo 1 nhà sản xuất (VD: toàn bộ sản phẩm của rolex)
    public function ProductOfBrands($brand_id)
    {
        $qr = "SELECT * FROM products WHERE prod_brand = $brand_id ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Show sản phẩm trang sản phẩm
    public function SelectFilterProduct($brand, $cat, $priceMin, $priceMax, $title)
    {
        $qr = "SELECT * FROM `products`
                WHERE prod_brand = $brand
                AND prod_cat = $cat
                AND prod_quantity > 0
                AND prod_title LIKE N'%$title%'
                AND prod_price >= $priceMin
                AND prod_price <= $priceMax 
                ORDER BY RAND()";
        return mysqli_query($this->con, $qr);
    }
    //Tìm giá bán cao nhất, dùng cho chức năng tìm kiếm nâng cao (input range) lọc giá bán
    public function GetMaxPrice()
    {
        $qr = "SELECT MAX(prod_price) FROM `products`";
        $result = mysqli_query($this->con, $qr);
        $rows = mysqli_fetch_array($result);
        return json_encode($rows[0]);
    }
    public function SearchProduct($itemSearch)
    {
        $qr = "SELECT * FROM products WHERE prod_title LIKE N'%$itemSearch%'";
        return mysqli_query($this->con, $qr);
    }
}
