<?php

class TransactionModels {
    private $table = 'transactions';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $id_users = $_SESSION['id_user'];
        $query = "SELECT transactions.description, transactions.id, transactions.amount, transactions.type FROM transactions JOIN wallets ON transactions.id_wallets = wallets.id JOIN users ON users.id = wallets.id_users WHERE users.id = :id_users";

        $this->db->query($query);
        $this->db->bind('id_users', $id_users, PDO::PARAM_INT);
        $this->db->execute();

        $response = $this->db->resultSet();
        return $response;
    }

    public function add($data) {
        $id_users = $_SESSION['id_user'];
        $query = "INSERT INTO $this->table (id, amount, description, type, id_wallets) VALUES ('', :amount, :description, :type, :id_wallets)";

        $this->db->query($query);
        $this->db->bind('amount', $data['amount'], PDO::PARAM_INT);
        $this->db->bind('description', $data['description'], PDO::PARAM_STR);
        $this->db->bind('type', $data['type'], PDO::PARAM_STR);
        $this->db->bind('id_wallets', $data['id_wallets'], PDO::PARAM_INT);
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