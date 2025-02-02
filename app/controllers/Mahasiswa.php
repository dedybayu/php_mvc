<?php
class Mahasiswa extends Controller{
    public function index(){
        $data['title'] = 'mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if ($this->model('MahasiswaModel')->tambahDataMahasiswa($_POST) > 0){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;

        }
    }
    public function hapus($id){
        if ($this->model('MahasiswaModel')->hapusDataMahasiswa($id) > 0){
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;

        }
    }
    public function getubah(){
        echo json_encode($this->model('MahasiswaModel')->getMahasiswaById($_POST['id']));
    }

    public function ubah(){
        if ($this->model('MahasiswaModel')->ubahDataMahasiswa($_POST) > 0){
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;

        }
    }
}