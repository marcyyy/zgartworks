<?php

include 'db.inc.php';

$id = $_POST['id'];

$sql = "SELECT * FROM portfolio WHERE id=".$id or die( mysqli_error($conn));
$result = mysqli_query($conn,$sql);

$response = "";
while($row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $titlesrc = $row['pf_title'];
    $imgsrc = "includes/portfolio/".$row['pf_image'];

    $response .= "<img class='modal-content' src=".$imgsrc."? style='width: auto; height: auto; max-height: 100%;'>";

}

echo $response;
exit;