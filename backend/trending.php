<?php
    $db= new mysqli('localhost','root','','allusion');
    $query= "Select `quesid`,`quesstat` from `question` Where `quesid` IN(Select `quesid` from `trending` Where 1)";
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
