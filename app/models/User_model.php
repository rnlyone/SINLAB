<?php

class User_model extends Model{
    protected $table = 'users';


    public function GetPraktikan(){
        $this->db->query('SELECT * FROM ' . $this->table . 'where jenis=:jenis');
        $this->db->bind('jenis', 'praktikan');
        return $this->db->resultSet();
    }

    public function GetByUsername($username){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }


    public function Create($data){
        $query = "INSERT INTO" . $this->table . " VALUES (:id, :nama, :username, :password, :jenis)";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('jenis', $data['jenis']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function Delete($id){
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

}