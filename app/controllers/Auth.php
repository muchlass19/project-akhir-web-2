<?php

class Auth extends Controller {
    public function register() {
        $this->view('templates/header');
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function registerPost() {
        if($this->model('UserModels')->register($_POST) > 0) {
            Flasher::setFlash('Berhasil mendaftarkan user!', 'success');
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
        $response = $this->model('UserModels')->login($_POST);

        if($response == 0) {
            Flasher::setFlash('Email atau password tidak ditemukan!', 'danger');
        } else {
            $_SESSION['id_user'] = $response['id'];
            $_SESSION['fullname'] = $response['fullname'];
        }

        if(isset($_SESSION['id_user'])) {
            header('Location: '.BASEURL.'/home');
            exit;
        }

        header('Location: '.BASEURL.'/auth/login');
        exit;
    }

    public function logout() {
        if(isset($_SESSION['id_user'])) {
            unset($_SESSION['id_user']);
            unset($_SESSION['fullname']);
            header('Location: '.BASEURL.'/auth/login');
            exit;
        } else {
            Flasher::setFlash('Gagal Logout!', 'danger');
            header('Location: '.BASEURL.'/home');
            exit;
        }
    }
}