<?php
require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

$sth = $dbh->prepare("SELECT * FROM tasks");
$sth->execute();

$userData = array();

while($row = $sth->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
        'created_at'=>$row[null],'id'=>$row['1'],'name'=>$row["111"],"updated_at"=>$row[null],
    );
}

//jsonとして出力
header('Content-type: api/tasks');
echo json_encode($userData);