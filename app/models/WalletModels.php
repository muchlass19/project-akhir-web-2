<?php

class WalletModels {
    private $table = 'wallets';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllWallets($data) {
        $id_users = $_SESSION['id_users'];
        $query = "SELECT * FROM $this->table WHERE id_users = :id_users";

        $this->db->query($query);
        $this->db->bind('id_users', $id_users, PDO::PARAM_INT);
        $this->db->execute();

        $result = $this->db->resultSet();
        return $result;
    }
}