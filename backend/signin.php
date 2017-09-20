<?php
require_once('constants.php');
if($data= json_decode(file_get_contents('php://input'),true))
{
    /*print_r($data);*/
    $db= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    if($db->connect_error){
        die(/*"Error:".$db->connect_error*/"false");
    }
    $query="Select * from `user` Where `username`='".$data['username']."'&& `password`='".$data['password']."'";
    if(!$result=$db->query($query))
        die(/*$db->error*/"false");
    if($row=$result->fetch_assoc())
        echo "true";
    else
        echo "false";

}



