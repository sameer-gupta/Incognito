<?php
if(isset($_GET['username'])){
    $db= new mysqli('localhost','root','','allusion');
    $query= "SELECT `quesid`, `quesstat` from question where `quesid` IN(Select `quesid` from `questag` Where tagid IN(SELECT tagid FROM `usertotag` WHERE `username`='".$_GET['username']."')) order by `question`.`qtime`";
    if(!$result=$db->query($query)){
        die("Error:".$db->error);
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
