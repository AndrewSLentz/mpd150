<?php  
    $json = file_get_contents("sample-data.json");
    header('Content-Type: application/json');
    echo $json;
?>