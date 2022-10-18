<?php

/**
 * Dit is de model voor de controller Countries
 */

class Country
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichestPeoples()
    {
        $this->db->query('SELECT * FROM RichestPeople');
        return $this->db->resultSet();
    }

    public function getRichestPeople($id)
    {
        $this -> db->query("SELECT * FROM RichestPeople WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    

}