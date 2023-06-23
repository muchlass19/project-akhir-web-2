<?php

class Auth extends Controller {
    public function register() {
        $this->view('templates/header');
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function registerPost() {
        if($this->model('UserModels')->register($_POST) > 0) {
            header('Location: '.BASEURL.'/auth/login');
            exit;
        }
    }

    public function login() {
        $this->view('templates/header');
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function loginPost() {
        if($this->model('UserModels')->login($_POST) > 0) {
            header('Location: '.BASEURL.'/home');
            exit;
        }
    }
}