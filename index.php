<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$totalq = $PDO->prepare("select count(id) from produtos");
 $totalq->execute();
$total =$totalq->fetch()[0];
$stmt = $PDO->prepare("select * from produtos");
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <p><a href="form-add.php">Adicionar carro</a></p>
        <h2>Lista loja </h2>
        <p>Total de carros: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
            <table width="50%" border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Date</th>
                        <th>Quantidade</th>
         
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['color'] ?></td>
                            <td><?php echo $user['price'] ?></td>
                            <td><?php echo $user['quantity'] ?></td>
                           <td><?php echo dateConvert($user['startDate']) ?></td>
                            <td><?php echo calculateAge($user['startDate']) ?> anos</td>
                            <td>
                                <a href="form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                                <a href="delete.php?id=<?php echo $user['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum usuário registrado</p>
        <?php endif; ?>
    </body>
</html>