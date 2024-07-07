<?php

class AuthCtrl {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: /home');
        } else {
            renderView('auth/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: /login');
        } else {
            renderView('auth/register');
        }
    }

    public function logout() {
        // session_start();
        // session_unset();
        // session_destroy();
        header("Location: /login");
        exit;
    }
}
