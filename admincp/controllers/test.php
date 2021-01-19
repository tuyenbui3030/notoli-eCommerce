<?php
class Test extends Controller
{
    public $user;
    public $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    public function Action()
    {
        $target = SITE_ROOT . "public/assets/img/products/";
        $allowedFileType = array('jpg', 'png', 'jpeg');

        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {

            // Loop through file items
            foreach ($_FILES['fileUpload']['name'] as $id => $val) {
                // Get files upload path
                $fileName        = $_FILES['fileUpload']['name'][$id];
                $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath  = $target . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));


                if (in_array($fileType, $allowedFileType)) {
                    if (move_uploaded_file($tempLocation, $targetFilePath)) {
                        echo "Thành công";
                    } else {
                        echo "Thất bại";
                    }
                } else {
                    echo "File không đúng định dạng";
                }
            }
        }


        exit();
        //Add ảnh đại diện
        $msg = "";
        $image = $_FILES['avatar']['name'];
        $target = SITE_ROOT . "public/assets/img/products/" . basename($image);
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        echo $msg;
    }
}
