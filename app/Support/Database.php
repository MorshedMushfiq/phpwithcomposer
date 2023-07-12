<?php
namespace App\Support;

use mysqli;

abstract class Database {
    //private propertie of host
    private $host = "localhost";
    //private propertie of user
    private $user = "root";
    //private propertie of pass
    private $pass = "";
    //private propertie of database name
    private $db = "miniprofinal";
    //private propertie of connection
    private $connection;

    //connection function of mysql database
    private function connection(){
        return $this-> connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    //create query
    protected function create(string $table, array $data){
        //get table column
        $arr_keys = array_keys($data);
        $table_col = implode(', ', $arr_keys);
        // get column values
        $arr_val = array_values($data);
        $table_val = '';
        foreach($arr_val as $value){
            $table_val .= "'" . $value . "', ";
        }

        //get column actual value with qutation.
        $col_val = substr($table_val, 0, -2);
        $this->connection()->query("INSERT INTO $table($table_col)VALUES($col_val) ");

    }

    //all data show query.
    protected function all($table, $order="DESC"){
        return $this->connection()->query("SELECT * FROM $table ORDER by id = '$order'");
         
    }

    //single data find query
    protected function find($table, $id){
        $data =  $this->connection()->query("SELECT *FROM $table WHERE id=$id");
        return $data ->fetch_object();
    }

    //delete data query
    protected function delete($table, $id){
        $this->connection()->query("DELETE FROM $table WHERE id = $id");
    }

    //update data query
    protected function update(string $table, int $id, array $data){
        $query_val ='';
        foreach($data as $key => $value){
            $query_val .= $key . "='" . $value . "', ";
        }
        $data_str = substr($query_val, 0, -2);
        $this->connection()->query("UPDATE $table SET $data_str WHERE id = $id");
    }

    //custom query
    protected function cq($sql){
       return $this->connection()->query($sql);
    }

}











?>