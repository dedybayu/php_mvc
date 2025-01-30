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
            header('Location: ' . BASEURL .'/mahasiswa');
            exit;
        }
    }
}