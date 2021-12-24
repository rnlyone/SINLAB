<?php

class Praktikum_model extends Model{
    protected $table = 'praktikum';


    public function Create($data){
        $query = "INSERT INTO" . $this->table . " VALUES (:id, :nama_praktikum, :semester)";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_praktikum', $data['nama_praktikum']);
        $this->db->bind('semester', $data['semester']);
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