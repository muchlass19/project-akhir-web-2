<?php

class WalletModels {
    private $name = 'Wallet 1';

    private $table = 'wallets';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getName() {
        return $this->name;
    }

    public function getAllWallets() {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
}