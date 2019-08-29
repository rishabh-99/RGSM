<?php

//fetch.php

include('database_connection.php');

$pid = 0;

$response = file_get_contents('http://localhost:8080/userId');
$JSONO=json_decode($response);


$reb= $JSONO[0]->userId;

$response1 = file_get_contents('http://localhost:8080/idRepos');
$JSON1=json_decode($response1);


$reb1= $JSON1;

// for userId
$res=(int)$reb;
// for repoId
$res1=(int)$reb1;

$data="";
$query = "SELECT * FROM fileStructure where userId = '$reb' and repoId = '$JSON1'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data = get_node_data($pid, $connect);
}

echo json_encode(array_values($data));

function get_node_data($pid, $connect)
{
    $response = file_get_contents('http://localhost:8080/userId');
$JSONO=json_decode($response);


$reb= $JSONO[0]->userId;

$response1 = file_get_contents('http://localhost:8080/idRepos');
$JSON1=json_decode($response1);


$reb1= $JSON1;

// for userId
$res=(int)$reb;
// for repoId
$res1=(int)$reb1;


 $query = "SELECT * FROM fileStructure WHERE pid = '$pid' and userID = '$reb' and repoId = '$JSON1'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = array();
 foreach($result as $row)
 {
  $sub_array = array();
  $sub_array['text'] = $row['name'];
  $sub_array['nodes'] = array_values(get_node_data($row['id'], $connect));
  $output[] = $sub_array;
 }
 
 return $output;
}

?>