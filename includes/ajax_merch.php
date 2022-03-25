<?php

include 'db.inc.php';

$id = $_POST['id'];

$sql = "SELECT * FROM merch WHERE id=".$id or die( mysqli_error($conn));
$result = mysqli_query($conn,$sql);

$response = "";
while($row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $imgsrc = "includes/merch/".$row['image'];

    $response .= "<img class='modal-content' src=".$imgsrc."? style='width: auto; height: auto; max-height: 100%;'>";

}

echo $response;
exit;