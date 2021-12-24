<?php

class Dashboard extends Controller{
    private $lab;
    protected $submission;
    protected $diterima;
    protected $ditolak;
    private $db;
    private $date = 0;
    private $url;
    
    public function __construct()
    {
        $this->url = $this->parseURL();
        if ($this->lab == 0){
            $labchoice = " ";
        } else {
            $labchoice = "AND l.id = " . $this->lab;
        }
        if ($this->date == 0){
            $subdate = "CURDATE()";
        } else {
            $subdate =  '"' . $this->date . '"';
        }

        $semua = '
        select s.id as id, u.nama as nama, u.id as id_user, p.nama_praktikum as praktikum, a.nama_asisten as asisten, l.laboratorium as lab, s.kelas as kelas, s.judul as judul, s.deskripsi as deskripsi, s.bukti as bukti, s.status as status, s.created_at as created_at
        from submisi s, users u, praktikum p, asisten a, laboratorium l
        WHERE s.id_user = u.id
        AND s.id_praktikum = p.id
        AND s.id_asisten = a.id 
        AND s.id_laboratorium = l.id '
         . $labchoice .
        ' AND DATE(s.created_at) = '.$subdate.'
        AND s.status = "belum"';

        $diterima = '
        select s.id as id, u.nama as nama, u.id as id_user, p.nama_praktikum as praktikum, a.nama_asisten as asisten, l.laboratorium as lab, s.kelas as kelas, s.judul as judul, s.deskripsi as deskripsi, s.bukti as bukti, s.status as status, s.created_at as created_at
        from submisi s, users u, praktikum p, asisten a, laboratorium l
        WHERE s.id_user = u.id
        AND s.id_praktikum = p.id
        AND s.id_asisten = a.id 
        AND s.id_laboratorium = l.id '
         . $labchoice .
        ' AND DATE(s.created_at) = '.$subdate.'
        AND s.status = "terima"';

        $ditolak = '
        select s.id as id, u.nama as nama, u.id as id_user, p.nama_praktikum as praktikum, a.nama_asisten as asisten, l.laboratorium as lab, s.kelas as kelas, s.judul as judul, s.deskripsi as deskripsi, s.bukti as bukti, s.status as status, s.created_at as created_at
        from submisi s, users u, praktikum p, asisten a, laboratorium l
        WHERE s.id_user = u.id
        AND s.id_praktikum = p.id
        AND s.id_asisten = a.id 
        AND s.id_laboratorium = l.id '
         . $labchoice .
        ' AND DATE(s.created_at) = '.$subdate.'
        AND s.status = "tolak"';

        $this->submission = $this->model('Submisi_model')->Querys($semua);
        $this->diterima = $this->model('Submisi_model')->Querys($diterima);

        $this->ditolak = $this->model('Submisi_model')->Querys($ditolak);

            $this->db = new Database;

            $this->authonly();
            $this->db->query('SELECT * FROM ' . 'laboratorium');
    }

    public function index(){

        if(!is_null($this->url[1])){
            foreach($this->db->resultSet() as $labo){
                if($this->url[1] == $labo['laboratorium']){
                    $this->lab = $labo['id'];
                    $this->__construct();
            
                    $this->view('layout/header', ['judul' => 'LAB '.$labo['laboratorium'].' SINLAB']);
                    $this->view('layout/dashbar', ['user' => $_SESSION["user"], 'laboratorium' => $this->db->resultSet(), $labo['laboratorium'] => 'active']);
                    $this->view('auth/dashboard', ['dashname' => 'Laboratorium '.$labo['laboratorium'], 'user' => $_SESSION["user"], 'submisi' => $this->submission, 'diterima' => $this->diterima, 'ditolak' => $this->ditolak]);
                    $this->view('layout/footer');
                }

                if ($this->url[1] == $labo['laboratorium']){
                        $this->view('error/404');
                }
            }
        } else {
            $this->lab = 0;
            $this->__construct();
            $this->view('layout/header', ['judul' => 'Dashboard SINLAB']);
            $this->view('layout/dashbar', ['user' => $_SESSION["user"], 'laboratorium' => $this->db->resultSet(), 'dashbar' => 'active']);
            $this->view('auth/dashboard', ['dashname' => 'Dashboard', 'submisi' => $this->submission, 'diterima' => $this->diterima, 'ditolak' => $this->ditolak]);
            $this->view('layout/footer');
        }

    }

    public function riwayat($date = 0){
        $this->lab = 0;
        $this->date = $date;
        $this->__construct();

        $datepicker = '<div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">Filter</h5>
                                <input type="date" name="datepicker" id="datepicker" onchange="datepicker(event);" class="form-control">
                            </div>
                        </div>';

        $this->view('layout/header', ['judul' => 'Riwayat SINLAB']);
        $this->view('layout/dashbar', ['user' => $_SESSION["user"], 'laboratorium' => $this->db->resultSet(), 'riwayat' => 'active']);
        $this->view('auth/dashboard', ['dashname' => 'Riwayat', 'user' => $_SESSION["user"], 'submisi' => $this->submission, 'diterima' => $this->diterima, 'ditolak' => $this->ditolak, 'datepicker' => $datepicker]);
        $this->view('layout/footer');
    }

}