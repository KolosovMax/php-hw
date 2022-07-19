<?php
function tableExists($connection, $table){
    try{
       $result = $connection->query("SELECT 1 FROM $table LIMIT 1");
    }catch (Exception $e){
        return false;
    }
    return  $result !== false;
}