<?php
class Admin extends Controller{
    public function index(){
        $data['judul'] = "Admin Dashboard";
        $this->view('templates/Header',$data);
        $this->view('Admin/index',);
        $this->view('templates/Footer');
    }
}