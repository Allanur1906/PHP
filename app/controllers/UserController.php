<?php
require_once "app/models/User.php";

class UserController{

    public function __construct(){
        var_dump('cons');
       
    }

    public static function index() {

        if(!isset($_SESSION["user_id"])){
            header("Location: /online_shop/login");
            exit();
        }

        $users = User::getAllUsers();
        require_once "app/views/users/index.php";
    }

    public static function show() {
        $user_id = $_GET['id'];
        $user = User::getUser($user_id);

        if ($user) {
            require_once "app/views/users/show.php";
        } else {
            $_SESSION['error'] = "User not found";
            require_once "app/views/404.php";
        }

    }

    public static function test(){
        echo 'test';
    }
}
?>