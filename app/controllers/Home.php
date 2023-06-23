<?php

class Home extends Controller {
    public function index() {
        // $data['wallet_name'] = $this->model('WalletModels')->getName();
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('templates/navbar');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}