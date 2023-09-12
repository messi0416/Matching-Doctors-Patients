<?php

namespace App;

use PDO;

class Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'recourgadmin', $db_pass = 'zANqdcyVi2GF7', $db_host = 'recourgadmin.mysql.db')
    {
        $this->db_name= $db_name;
        $this->db_user= $db_user;
        $this->db_pass= $db_pass;
        $this->db_host= $db_host;

    }
    private function getPDO(){
        
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=recourgadmin;host=recourgadmin.mysql.db' , 'recourgadmin', 'zANqdcyVi2GF7');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statment, $class_name){

        $req = $this->getPDO()->query($statment);    
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }
    public function prepare($statment, $atribut, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statment);
        $req->execute($atribut);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $req->fetch();

        }else{
            $datas = $req->fetchAll();

        }
        return $datas;
    }
}