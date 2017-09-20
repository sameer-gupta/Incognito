<?php
$db= new mysqli('localhost','root','','allusion');

/*$array=array('username'=>'abc',
    'quesstat'=>'How are you',
    'tag_name'=>array(
        "0"=>"abc",
        "1"=>"harami"
    )
);*/


    $query = "select `id` from `temp`";
    $result = $db->query($query);
	$row=$result->fetch_assoc();
	$id = $row['id'];
    	
	/*$query = "delete from `temp` where 1";
    if (!$result = $db->query($query)) {
        die($db->error);
    }	*/
	//echo $id;
	
	$query = "select `quesid`, `quesstat` from `question` where `quesid` = '".$id."'";
	if(!$result=$db->query($query)){
		echo $db->error;
	}
	$row=$result->fetch_assoc();
	$ques=array();
	$ques=array('quesid' => $row['quesid'],"quesstat" => $row['quesstat']);
	echo json_encode($ques);	