<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Produtos</title>
    </head>
    <body>
        <h1>Sistema de Produtos</h1>
        <h2>Edição de Produtos</h2>
        <form action="edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
            <br><br>
            <label for="email">Email: </label>
            <br>
            <input type="text" name="color" id="color" value="<?php echo $user['color'] ?>">
            <br><br>
            <input type="text" name="price" id="price" value="<?php echo $user['price'] ?>">
            <br>
			<input type="text" name="quantity" id="quantity" value="<?php echo $user['quantity'] ?>">
            <br>
            <br><br>
            <label for="birthdate">Data: </label>
            <br>
            <input type="text" name="startDate" id="startDate" placeholder="dd/mm/YYYY" 
                   value="<?php echo dateConvert($user['startDate']) ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar">
        </form>
    </body>
</html>