<?php

header('Content-Type: application/json; charset=utf-8');

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "teachers";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

if($conn->connect_error){

die(json_encode([
"error"=>"Conexión fallida: ".$conn->connect_error
]));

}

$sql = "SELECT
id_teacher,
nombre,
materia,
correo,
dias,
horario,
frase,
imagen,
cumple
FROM usuarios";


$result = $conn->query($sql);

$teachers=[];

if($result && $result->num_rows>0){

while($row=$result->fetch_assoc()){

$teachers[]=[

"id_teacher"=>$row["id_teacher"],

"nombre"=>$row["nombre"],

"materia"=>$row["materia"],

"correo"=>$row["correo"],

"dias"=>$row["dias"],

"horario"=>$row["horario"],

"frase"=>$row["frase"],

"imagen"=>$row["imagen"],

"cumple"=>$row["cumple"]

];

}

}

echo json_encode(
$teachers,
JSON_UNESCAPED_UNICODE
);

$conn->close();

?>