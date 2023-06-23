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

    public function getAll() {
        $id_users = $_SESSION['id_user'];
        $query = "SELECT * FROM $this->table WHERE id_users = :id_users";

        $this->db->query($query);
        $this->db->bind('id_users', $id_users, PDO::PARAM_INT);
        $this->db->execute();

        $response = $this->db->resultSet();
        return $response;
    }

    public function add($data) {
        $id_users = $_SESSION['id_user'];
        $query = "INSERT INTO $this->table (id, name, id_users) VALUES('', :name, :id_users)";

        $this->db->query($query);
        $this->db->bind('name', $_POST['wallet_name'], PDO::PARAM_STR);
        $this->db->bind('id_users', $id_users, PDO::PARAM_INT);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id, PDO::PARAM_INT);
        $this->db->execute();

        return $this->db->rowCount();
    }
}