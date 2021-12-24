<?php 

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe)
    {
        session_start();
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe
        ];
    }

    public static function flash()
    {
        session_start();
        if( isset($_SESSION['flash']) ) {
            echo '
                <div class="alert alert-'. $_SESSION['flash']['tipe'] .'" role="alert">
                    <strong>'. $_SESSION['flash']['pesan'] .'</strong> ' . $_SESSION['flash']['aksi'] . '
                </div>
                ';
            unset($_SESSION['flash']);
        }
    }
}