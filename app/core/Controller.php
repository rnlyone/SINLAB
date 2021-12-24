<?php

class Controller {

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function authonly()
    {
        session_start();
        if(!isset($_SESSION["user"]) OR $_SESSION["user"]["jenis"] == 'praktikan') {
            header("Location: ". BASEURL . "/");
            Flasher::setFlash('403 Dilarang', 'Anda Bukan Administrator', 'danger'); 
        }
    }

    public function guestonly()
    {
        session_start();
        if(isset($_SESSION["user"])) {
            header("Location: ". BASEURL . "/");
            Flasher::setFlash('403 Dilarang', 'Anda Sudah Login', 'danger'); 
        }
    }

    public function praktikanonly()
    {
        session_start();
        if(!isset($_SESSION["user"]) OR $_SESSION["user"]["jenis"] == 'admin') {
            header("Location: ". BASEURL . "/");
            Flasher::setFlash('403 Dilarang', 'Anda Sudah Login', 'danger'); 
        }
    }
    
    public function parseURL(){
        if( isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}