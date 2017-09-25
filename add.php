<?php
require_once 'init.php';
// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['color']) ? $_POST['color'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
 $price = isset($_POST['price']) ? $_POST['price'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($email) || empty($price) || empty($birthdate))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO produtos(id,name, color, price, startDate,quantity ) VALUES(0,:name,:email, :price,CURTIME() , :birthdate)";
//$sql = 'INSERT INTO produtos(id,name, color, price, startDate,quantity ) VALUES(0,"aa","a", 10, 01-01-01, 10)';
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':price', $price);
//$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':birthdate', $birthdate);

if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}