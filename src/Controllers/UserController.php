<?php

namespace BlogObjMvc\Controllers;

use BlogObjMvc\Models\UserManager;
use BlogObjMvc\Validator;

/** Class UserController **/
class UserController
{
    private UserManager $user_manager;
    private Validator $validator;

    public function __construct()
    {
        $this->user_manager = new UserManager();
        $this->validator = new Validator();
    }

    public function showLogin(): void
    {
        require VIEWS . 'Auth/login.php';
    }

    public function showRegister(): void
    {
        require VIEWS . 'Auth/register.php';
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /login/');
    }

    public function register(): void
    {
        $this->validator->validate([
            "name" => ["required", "min:2", "alphaNum"],
            "password" => ["required", "min:2", "alphaNum", "confirm"],
            "passwordConfirm" => ["required", "min:2", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->user_manager->find($_POST["name"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->user_manager->store($password);

                $_SESSION["user"] = [
                    "id" => $this->user_manager->getBdd()->lastInsertId(),
                    "name" => $_POST["name"]
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['name'] = "Le name choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login(): void
    {
        $this->validator->validate([
            "name" => ["required", "min:2", "max:9", "alphaNum"],
            "password" => ["required", "min:2", "alphaNum"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->user_manager->find($_POST["name"]);

            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId(),
                    "name" => $res->getname()
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }
}
