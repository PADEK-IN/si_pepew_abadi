<?php 
class MiddlewareAuth {
    public function isAuth(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['role'] !== 'admin'){
                redirect('/home');
            }
            if($_SESSION['user']['role'] !== 'pelanggan'){
                redirect('/admin/dashboard');
            }
        }
    }

    public function isAdmin(){
        if(!isset($_SESSION['user'])){
            setFlash('warning', 'Maaf, anda harus login terlebih dahulu!');
            redirect('/login');
        } else {
            if($_SESSION['user']['role'] !== 'admin'){
                redirect('/home');
            }
        }
    }

    public function isUser(){
        if(!isset($_SESSION['user'])){
            setFlash('warning', 'Maaf, anda harus login terlebih dahulu!');
            redirect('/login');
        } else {
            if($_SESSION['user']['role'] !== 'pelanggan'){
                redirect('/admin/dashboard');
            }
        }
    }
}