<?php

//fill_parent_category.php

include('database_connection.php');

$response = file_get_contents('http://localhost:8080/userId');

$JSONO=json_decode($response);


$res= $JSONO[0]->userId;

$query = "SELECT * FROM reposDet where userId='$res'";


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '<option value="0">select repos</option>';

foreach($result as $row)
{
 $output .= '<option value="'.$row["pid"].'" namer="'.$row["name"].'">'.$row["name"].'</option>';
}

echo $output;

?>
