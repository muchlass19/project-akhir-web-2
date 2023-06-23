<?php

class Transaction extends Controller {
    public function index() {
        if(isset($_SESSION['id_user'])) {
            $data['wallets'] = $this->model('WalletModels')->getAll();
            $data['transactions'] = $this->model('TransactionModels')->getAll();
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('templates/navbar');
            $this->view('transaction/index', $data);
            $this->view('templates/footer');
        }
    }

    public function add() {
        $response = $this->model('TransactionModels')->add($_POST);

        if($response > 0) {
            Flasher::setFlash('Berhasil menambahkan transaksi', 'success');
        } else {
            Flasher::setFlash('Gagal menambahkan dompet!');
        }

        header('Location: '.BASEURL.'/transaction');
        exit;
    }

    public function delete($id) {
        $response = $this->model('TransactionModels')->delete($id);

        if($response == 0) {
            Flasher::setFlash('Gagal menghapus transaksi!', 'danger');
        } else {
            Flasher::setFlash('Transaksi berhasil dihapus!', 'success');
        }

        header('Location: '.BASEURL.'/transaction');
        exit;
    }
}