<?php

include_once("config.php");

if(iseet($_POST['update'])){
    $id=$_POST['id']
    $name=$_POST['name']
    $surname=$_POST['surname']
    $email=$_POST['email']

    $sql="UPDATE user SET name=:name, surname=surname, email=:email WHERE id=:id";

    $prep=$coon-prepare($sql);
    $prep->bindParam(':id',$id);
    $prep->bindParam(':name',$name);
    $prep->bindParam(':surname',$surname);
    $prep->bindParam(':email',$email);

}