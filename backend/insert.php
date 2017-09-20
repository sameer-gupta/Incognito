<?php
$db= new mysqli('localhost','root','','allusion');

/*$array=array('username'=>'abc',
    'quesstat'=>'How are you',
    'tag_name'=>array(
        "0"=>"abc",
        "1"=>"harami"
    )
);*/

if($array= json_decode(file_get_contents('php://input'),true)) {
    $query = "Insert into `question`(`quesstat`) VALUES('" . $array['quesstat'] . "')";
    if (!$result = $db->query($query)) {
        die($db->error);
    }
    $query = "SELECT last_insert_id() as id";
    if (!$result = $db->query($query))
        echo $db->error;
    $row = $result->fetch_assoc();
    $quesid = $row['id'];

    $tag = array();
    foreach ($array['tags'] as $value) {
        $query = "Select `tagid` from `tags` where `tagname`='" . $value['name'] . "'";
        $result = $db->query($query);
        if ($row = $result->fetch_assoc()) {
            $tag[] = $row['tagid'];
        } else {
            $query = "Insert into `tags`(`tagname`)VALUES ('" . $value['name'] . "')";
            if (!$result = $db->query($query)) {
                echo $db->error;
            }
            $query = "select last_insert_id() as id";
            if (!$result = $db->query($query))
                echo $db->error;
            $row = $result->fetch_assoc();
            $tag[] = $row['id'];
        }
    }
    var_dump($tag);
    foreach ($tag as $value) {
        $query = "Select * from `usertotag` where `username`='" . $array['username'] . "' and  `tagid`='" . $value . "'";
        $result = $db->query($query);
        if (!$row = $result->fetch_assoc()) {
            $query = "Insert into `usertotag` VALUES('" . $array['username'] . "','" . $value . "')";
            echo $query;
            if (!$result = $db->query($query)) {
                die($db->error);
            }
        }
        $query = "Insert into`questag` VALUES ('" . $quesid . "','" . $value . "','".$array['username']."')";
        if (!$result = $db->query($query))
            echo $db->error;

    }

    var_dump($tag);
}