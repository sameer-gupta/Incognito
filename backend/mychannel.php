<?php
if(isset($_GET['username'])){
    $db= new mysqli('localhost','root','','allusion');
    $query= "Select `quesid`, `quesstat` from `question` where `quesid` IN(Select `quesid` from `questag` Where `username`='".$_GET['username']."') order by `question`.`qtime`";
    if(!$result=$db->query($query)){
        die("Error:".$db->connect_error);
    }
    $ques=array();
    while($row=$result->fetch_assoc()){
        $ques[] = array('quesid' => $row['quesid'],
		'quesstat' => $row['quesstat']);
        //$ques[]['quesstat']=>$row['quesstat'];
    } 	
    $ques=json_encode($ques);
    echo $ques;
}