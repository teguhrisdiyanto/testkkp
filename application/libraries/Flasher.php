<?php

class Flasher
{

    public static function set_Flash($pesan, $aksi, $tipe)
    {
        // set session
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        // cek apakah ada session
        if (isset($_SESSION['flash'])) {
            // lalu copypas alerts dari bootstrap echo 'isi copypas'
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data Mahasiswa
                    <strong>' . $_SESSION['flash']['pesan'] . '</strong> 
                    ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';

            // hapus session .. session ini hanya berlaku 1 kali
            unset($_SESSION['flash']);
        }
    }
}
