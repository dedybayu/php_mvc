<?php
class About extends Controller{
    public function index($nama = 'DBS', $pekerjaan = 'Sound Engginer', $umur = 20){
        // echo "Halo, saya $nama pekerjaan $pekerjaan";
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['title'] = 'About me';

        $this->view('templates/header',$data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page(){
        // echo 'About/page';
        $data['title'] = 'About Page';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');

    }
}