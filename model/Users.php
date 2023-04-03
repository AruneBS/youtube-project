<?php

namespace Model;

class Users extends Database{
    public $table = 'users';

    // function categoryUsers($id){
    //     $result = self::$db->query("SELECT * FROM $this->table WHERE id = $id");
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }
    
}