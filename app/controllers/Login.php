<?php

class Login extends Controller {
    public function index(){
        $this->guestonly();
        $this->view('layout/header', ['judul' => 'Login SINLAB']);
        $this->view('home/login', $_SESSION['user']);
        $this->view('layout/footer');
    }

    public function auth(){
        $data = $this->model('User_model')->GetByUsername($_POST['username']);
        // var_dump($data['id']);
            if($_POST['password'] == $data['password']){
                session_start();
                $_SESSION["user"] = $data;
                Flasher::setFlash('Berhasil', 'Anda Berhasil Login', 'success');
                header("Location: " . BASEURL . "/");
            } else {
                Flasher::setFlash('Gagal', 'Username / Password Salah', 'danger');
                header("Location: " . BASEURL . "/login");
            }
    }

    public function logout(){
        session_start();
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: " . BASEURL);
    }
}