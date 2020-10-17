<?php
if($_POST){

    $email = strtolower(trim($_POST["email"]));
    $password = strtolower(trim($_POST["clave"]));
    $file = "avatar.svg";
    $errors = array();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Correo Invalido";
    }else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email)){
        $errors["email"] = "Correo Invalido";
    }

    if($_FILES){
        $avatar = $_FILES["avatar"];
        $extension = end(explode("/", $avatar["type"]));
        $permitidas = array("svg", "jpeg", "jpg", "png");
        $tamaño = (int) ini_get('upload_max_filesize') * 1024;
        if(!in_array($extension, $permitidas)){
            $errors["avatar"] = "Extension no permitida";
        }else if($avatar["size"] >= $tamaño){
            $errors["avatar"] = "El archivo supera los ".ini_get('upload_max_filesize');
        }else{
            move_uploaded_file(dirname($avatar["name"]),"/uploads/avatars");
            $file = $avatar["name"];
        }
    }

    if(count($errors) == 0){
        $query = "INSERT INTO `Usuarios` (`email`, `clave`,`avatar`) VALUES ('".$email."','".$password."','".$file."')" ;
        echo($query);
        mysqli_query($database,$query);
        header("Location:/hollywood/?view=login&&action=success&&msg=Usuario Registrado");
    }
    



}
