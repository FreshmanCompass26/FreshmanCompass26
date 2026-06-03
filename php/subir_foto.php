<?php

session_start();
include 'php/conexion.php';

$idUsuario = $_SESSION['usuario_id'];

if(isset($_FILES['foto'])){

    $archivo = $_FILES['foto'];

    $extension = strtolower(
        pathinfo(
            $archivo['name'],
            PATHINFO_EXTENSION
        )
    );

    $permitidas = ['jpg','jpeg','png','webp'];

    if(in_array($extension,$permitidas)){

        $nombreArchivo =
        time().'_'.$archivo['name'];

        $ruta =
        'uploads/perfiles/'.$nombreArchivo;

        move_uploaded_file(
            $archivo['tmp_name'],
            $ruta
        );

        $sql =
        "UPDATE estudiantes
        SET foto_perfil=?
        WHERE usuario_id=?";

        $stmt =
        $conn->prepare($sql);

        $stmt->bind_param(
        "si",
        $nombreArchivo,
        $idUsuario
        );

        $stmt->execute();

    }

}

header("Location: perfil.php");
exit();