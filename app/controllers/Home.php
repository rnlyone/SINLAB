<?php

class Home extends Controller{
    public function index()
    {
        session_start();
        $praktikum = $this->model('Praktikum_model')->GetAll();
        $asisten = $this->model('Asisten_model')->GetAll();
        $laboratorium = $this->model('Lab_model')->GetAll();
        $this->view('layout/header', ['judul' => 'SINLAB ICLABS']);
        $this->view('home/index', ['user' => $_SESSION["user"], 'praktikum' => $praktikum, 'asisten' => $asisten, 'laboratorium' => $laboratorium]);
        $this->view('layout/footer');
    }
}