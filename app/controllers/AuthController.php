<?php
require_once "app/models/User.php";

class AuthController
{
    public static function login_view()
    {
        require_once "app/views/auth/login.php";
    }

    public static function login_post()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['Password'] ?? '';


        $user = User::findUser($email);

        if ($user && password_verify($password, $user['password'])) {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            unset($_SESSION['error']);
            header("Location: /online_shop/users/index");
            // require_once "app/views/dashboard.php";
            // Start a session, set session variables, etc. // Ensure the session is started

        } else {
            $_SESSION["error"] = "Invalid login";
            header("Location: /online_shop/login");
            exit();

            // echo "Invalid email or password.";

        }
    }

    public static function logout()
    {
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page or homepage
        header("Location: /online_shop/login");
        exit();
    }

    public static function show()
    {
        $user_id = $_GET['id'];
        $user = User::getUser($user_id);

        if ($user) {
            require_once "app/views/users/show.php";
        } else {
            $_SESSION['error'] = "User not found";
            require_once "app/views/404.php";
        }
    }

    public static function test()
    {
        echo 'test';
    }
}
