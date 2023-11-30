<?php

class DataConnection
{
    function connectBD(){
        try{
            $con = new PDO("mysql:host=localhost;dbname=sweetteambd","root","");
            return $con;
        }catch (PDOException $err){
            return $err->getMessage();
        }
    }

}