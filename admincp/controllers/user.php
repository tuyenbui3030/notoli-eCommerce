<?php
class User extends Controller
{
    public $prod;
    public $cart;
    public function __construct()
    {
        $this->user = $this->model("UserModel");
    }
    public function Action()
    {
        $this->view("AdminLayout", [
            "page" => "Home",
            "listUsers" => $this->user->ShowUsers(),
        ]);
    }
}
