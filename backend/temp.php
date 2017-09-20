<?php
$db= new mysqli('localhost','root','','allusion');

//$array=array('qid'=>'20');

if($array=($_GET['qid'])) {
	var_dump($array);
    $query = "Insert into `temp` (`id`) VALUES('" . $array. "')";
    if (!$result = $db->query($query)) {
        die($db->error);
    }	
}