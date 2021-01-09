<?php
class Home extends Controller
{
    public $user;
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
