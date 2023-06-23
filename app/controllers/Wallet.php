<?php

class Wallet extends Controller {
    public function index() {
        if(isset($_SESSION['id_user'])) {
            $data['response'] = $this->model('WalletModels')->getAll();
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('templates/navbar');
            $this->view('wallet/index', $data);
            $this->view('templates/footer');
        }
    }

    public function add() {
        if(isset($_SESSION['id_user'])) {
            $response = $this->model('WalletModels')->add($_POST);

            if($response > 0) {
                Flasher::setFlash('Berhasil menambahkan dompet!', 'success');
                header('Location: '.BASEURL.'/wallet');
                exit;
            }
        } else {
            Flasher::setFlash('Tidak dapat menambahkan dompet! Login terlebih dahulu!', 'error');
            header('Location: '.BASEURL.'/auth/login');
            exit;
        }
    }

    public function delete($id) {
        $response = $this->model('WalletModels')->delete($id);

        if($response == 0) {
            Flasher::setFlash('Gagal menghapus dompet!', 'danger');
        } else {
            Flasher::setFlash('Dompet berhasil dihapus!', 'success');
        }

        header('Location: '.BASEURL.'/wallet');
        exit;
    }
}