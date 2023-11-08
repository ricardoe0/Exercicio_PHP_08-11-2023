<?php
$conn = new PDO("sqlite:../musicas.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$nome = $_GET["nome"];
$id = $_GET["id"];
$banda = $_GET["banda"];

if($id==0){
    $preparo = $conn->prepare("INSERT INTO musicas (nome,banda) VALUES(:nome,:banda);");
}else {
    $preparo = $conn->prepare("UPDATE musicas SET nome=:nome,banda=:banda WHERE id=:id;");
    $preparo->bindParam(":id",$id);
}

$preparo->bindParam(":nome", $nome);
$preparo->bindParam(":banda", $banda);

$preparo->execute();

header("Location:../index.php");