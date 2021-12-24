<?php

class Submisi extends Controller{


    public function index()
    {
        try {
            $bukti = pathinfo($_FILES['bukti']['name'], PATHINFO_FILENAME) . "_" . $_POST['nim'] . "_" . $_POST['deskripsi'] . "." . pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
            $location = "../public/img/uploaded/";
            move_uploaded_file($_FILES['bukti']['tmp_name'], $location . $bukti);

            $this->model('Submisi_model')->Create([
                'id_user' => $_POST['nim'],
                'id_praktikum' => $_POST['praktikum'],
                'id_asisten' => $_POST['asisten'],
                'id_laboratorium' => $_POST['laboratorium'],
                'kelas' => $_POST['kelas'],
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'bukti' => $bukti,
            ]);
            $latest = $this->model('Submisi_model')->Query('Select * from submisi where id_user = "'.$_POST['nim'].'" and deskripsi = "'. $_POST['deskripsi'] .'"');
            Flasher::setFlash('Sukses', 'Submisi Telah Dikirimkan Lihat Status <a href="'. BASEURL .'/submisi/surat/'. $_POST['nim'] .'/ '.$latest['id'].'"><strong>Disini</strong></a>', 'success');                   
            header("Location: " . BASEURL . "/");
        } catch (\Throwable $e) {
            Flasher::setFlash('Gagal', 'Submisi Gagal Dikirimkan', 'danger'); 
        }
        header("Location: " . BASEURL . "/");
    }

    public function konfirmasi($id, $status){
        $this->model('Submisi_model')->Update($id, 'status', $status);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function Hapus($id)
    {
        $this->model('Submisi_model')->Delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function surat($nim, $nosurat)
    {
        $surat = $this->model('submisi_model')->Query('
        select s.id as id, u.nama as nama, u.id as id_user, p.nama_praktikum as praktikum, a.nama_asisten as asisten, l.laboratorium as lab, s.kelas as kelas, s.judul as judul, s.deskripsi as deskripsi, s.bukti as bukti, s.status as status, s.created_at as created_at, a.telp_asisten as telp_asisten
        from submisi s, users u, praktikum p, asisten a, laboratorium l
        WHERE s.id_user = u.id
        AND s.id_praktikum = p.id
        AND s.id_asisten = a.id 
        AND s.id_laboratorium = l.id
        AND s.id = '.$nosurat.'
        AND s.id_user = ' . $nim);

        if ($surat == false){
            $this->view('layout/header');
            $this->view('error/404');
            $this->view('layout/footer');
        } else {
            $this->view('layout/header');
            $this->view('home/surat', ['surat' => $surat]);
            $this->view('layout/footer');
        }
    }
}