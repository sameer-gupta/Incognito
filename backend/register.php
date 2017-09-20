<?php
require_once('constants.php');
if($data= json_decode(file_get_contents('php://input'),true))
{
    $username=$data['username'];
    $password=$data['password'];
    $db= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    if($db->connect_error){
        die(/*"Error:".$db->connect_error*/"false");
    }
    $query="Select * from `user` Where `username`='".$username."'&& `password`='".$password."'";
    if($result=$db->query($query)){
        if($row=$result->fetch_assoc()){
            die("usernameexists");
        }
    }
    $query="INSERT into `user` VALUES ('".$username."','".$password."')";
    if(!$result=$db->query($query))
    {
        die(/*"ERROR:".$db->error*/"false");
    }
    echo "true";

}