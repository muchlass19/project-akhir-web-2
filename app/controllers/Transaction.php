<?php

class Transaction extends Controller {
    public function index() {
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('templates/navbar');
        $this->view('transaction/index');
        $this->view('templates/footer');
    }

    public function add() {
        var_dump($_POST);
    }
}