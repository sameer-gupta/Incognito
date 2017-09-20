<?php
$db= new mysqli('localhost','root','','allusion');

/*$array=array('username'=>'abc',
    'quesid'=>'25',
    'ansstat' => 'ghas dj dakd'
);*/

if($array= json_decode(file_get_contents('php://input'),true)) {
    $query = "INSERT INTO `answer`(`quesid`, `ansstat`) VALUES ('".$array['quesid']."','".$array['ansstat']."')";
    echo($query);
    if (!$result = $db->query($query)) {
        die($db->error);
    }
    //$query = "SELECT last_insert_id() as id";
}