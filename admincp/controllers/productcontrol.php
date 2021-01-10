<?php
class ProductControl extends Controller
{
    public $user;
    public $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    public function Action()
    {
        $this->view("AdminLayout", [
            "page" => "ProductControl",
        ]);
    }
}
