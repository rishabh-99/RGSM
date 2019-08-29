<?php

//fill_parent_category.php

include('database_connection.php');

$response = file_get_contents('http://localhost:8080/userId');
$JSONO=json_decode($response);


$reb= $JSONO[0]->userId;

$response1 = file_get_contents('http://localhost:8080/idRepos');
$JSON1=json_decode($response1);


$reb1= $JSON1;
echo $reb1;

// for userId
$res=(int)$reb;
// for repoId
$res1=(int)$reb1;
echo $res1;

$query = "SELECT * FROM fileStructure where type='folder' and userId='$res' and repoId='$res1' ORDER BY name ASC ";

echo $query;
$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '<option value="0">Root Folder</option>';

foreach($result as $row)
{
 $output .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
}

echo $output;

?>
