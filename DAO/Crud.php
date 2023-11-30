<?php

include('DataConnection.php');
class Crud extends DataConnection{
   #attribute
    private $crud;
    private $counter;

    #counting parameters method
    private function counteParamets($paramet){
        $this->counter = count($paramet);
    }

    #prepareStatementer method
    private function prepareStatement($query,$parameters){

        $this->counteParamets($parameters);
        $this->crud = $this->connectBD()->prepare($query);

        if($this->counter>0){
            for($i=1;$i<=$this->counter;$i++){
                $this->crud->bindvalue($i,$parameters[$i-1]);
            }
        }
        $this->crud->execute();
    }

    #insert method
    public function insertBD($table,$conditions,$parameters){
        $this->prepareStatement("insert into {$table} values({$conditions})",$parameters);
        return $this->crud;
    }

    #update method
    public function updateBD($table,$sets,$conditions,$parameters){
        $this->prepareStatement("update {$table} set {$sets} where {$conditions}",$parameters);
        return $this->crud;
    }

    #delete method
    public function deleteBD($table,$conditions,$parameters){
        $this->prepareStatement("delete from {$table} where {$conditions}",$parameters);
        return $this->crud;
    }

    #select method
    public function selectBD($table,$fields,$condition){
        $db = $this->connectBD();
        $query = $db->query("SELECT {$fields} FROM {$table} {$condition}");

        if($condition!=""){
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }else{
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    #select many by field method
    public function selectByFieldBD($table,$fields,$condition){
        $db = $this->connectBD();
        $query = $db->query("SELECT {$fields} FROM {$table} {$condition}");

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}