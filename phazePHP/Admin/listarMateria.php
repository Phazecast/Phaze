<meta charset="UTF-8">

<?php
@session_start();

if (isset($_SESSION['nome'])and $_SESSION['permissao'] == 1) {


include("conectaBanco.php");
$phazepodcast = mysql_query("select * from materia order by data_hora desc");
$materia = mysql_fetch_assoc($phazepodcast);

echo "<table align='center' border='1' width='90%' class='pure-table'>";
    
echo "<thead>";
echo "<tr>";
echo "<th>Imagem</th>";
echo "<th>Codigo Materia</th>";
echo "<th>Nome da Materia</th>";
echo "<th>Data</th>";
echo "<th>Texto</th>";
echo "<th>Introdução</th>";
echo "<th>Tema</th>";
echo "<th>Usuário</th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";
    
while ($materia) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver materia ele vai listar
    $codMateria = $materia['cod_materia'];
    $nomeMateria = $materia['nome_materia'];
    $texto = $materia['texto'];
    $introducao = $materia['introducao'];
    $tema = $materia['tema'];
    $imagem = $materia['imagem_da_capa'];
    $data = $materia['data_hora'];
    $usuario = $materia['usuario_do_post'];

    echo "<tr>";
    echo "<td> <img src='../$imagem' width='100' height='100' /> </td>";
    echo "<td>" . $codMateria . "</td>";
    echo "<td>" . $nomeMateria . "</td>";
    echo "<td>" . $data . "</td>";
    echo "<td>" . $texto . "</td>";
    echo "<td>" . $introducao . "</td>";
    echo "<td>" . $tema . "</td>";
    echo "<td>" . $usuario . "</td>";
    echo "<td> <a href='excluirMateria.php?codigoMateria=$codMateria'> Excluir</a> </td>"; // aqui estou mandando o codigo da materia junto se caso clicar em excluir
    echo "</tr>";

// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
    $materia = mysql_fetch_assoc($phazepodcast);
}
echo "</table>";

}else{
    
    header("location:phazeADM.php");
    
}
?>
    