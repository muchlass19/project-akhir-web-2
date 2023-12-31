<?php

class UserModels {
    private $table = 'users';
    private $db;
    private $response;

    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO $this->table (id, fullname, email, password) VALUES ('', :fullname, :email, :password)";
        $this->db->query($query);

        $this->db->bind('fullname', $data['fullname'], PDO::PARAM_STR);
        $this->db->bind('email', $data['email'], PDO::PARAM_STR);
        $this->db->bind('password', $password, PDO::PARAM_STR);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function login($data) {
        $query = "SELECT * FROM $this->table WHERE email = :email";
        $this->db->query($query);

        $this->db->bind('email', $data['email'], PDO::PARAM_STR);

        $this->db->execute();

        $result = $this->db->single();

        if($result) {
            $storedPassword = $result['password'];
            if(password_verify($data['password'], $storedPassword)) {
                return $result;
            }
        }

        return 0;
        
    }
}