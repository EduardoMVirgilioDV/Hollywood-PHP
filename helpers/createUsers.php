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


    if(count($errors) == 0){

        $usuarios = "SELECT * FROM `Usuarios` WHERE `email` ='".$email."'";
        $consulta = mysqli_query($database,$usuarios);
        $registrado = mysqli_num_rows($consulta) > 0? true: false;

        if(!$registrado){
            $query = "INSERT INTO `Usuarios` (`email`, `clave`,`avatar`) VALUES ('".$email."','".$password."','".$file."')" ;
            echo($query);
            mysqli_query($database,$query);
            header("Location:?view=home&&action=success&&msg=Usuario Registrado");
        }else{
            $usuario = mysqli_fetch_assoc($consulta);
            if($usuario["clave"] != $password){
                header("Location:?view=login&&action=danger&&msg=Clave Incorrecta");
            }else{
                $_SESSION["usuario"] = $usuario;
                $_SESSION["usuario"]["role"] = strpos($_SESSION["usuario"]["email"],"@hollywood") > 0 ? "admin" : "user";
                header("Location:?view=home&&action=success&&msg=Usuario Ingresado");
            }
        }
    }
    



}
