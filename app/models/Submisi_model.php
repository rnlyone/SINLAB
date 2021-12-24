<?php

class Submisi_model extends Model{
    protected $table = 'submisi';

    public function Create($data){
        $query = "INSERT INTO " . $this->table . 
                " VALUES (NULL, :id_user, :id_praktikum, :id_asisten, :id_laboratorium, :kelas, :judul, :deskripsi, :bukti, 'belum', now())";
        
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('id_praktikum', $data['id_praktikum']);
        $this->db->bind('id_asisten', $data['id_asisten']);
        $this->db->bind('id_laboratorium', $data['id_laboratorium']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('bukti', $data['bukti']);

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

    public function Update($id, $column, $update)
    {
        $query = "UPDATE `".$this->table."` SET `". $column ."` = '". $update ."' WHERE `" . $this->table . "`.`id` = " . $id;
        $this->db->query($query);
        $this->db->execute();
    }

}