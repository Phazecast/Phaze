<meta charset="UTF-8">

<?php
@session_start();

if (isset($_SESSION['nome'])and $_SESSION['permissao'] == 1) {


include("conectaBanco.php");
$phazepodcast = mysql_query("select * from materia order by data_hora desc");
$materia = mysql_fetch_assoc($phazepodcast);

echo "<table align='center' border='1' width='80%'>";
echo "<tr>";
echo "<td><b>Codigo Materia</b></td>";
echo "<td><b>Nome da Materia</b></td>";
echo "<td><b>Data</b></td>";
echo "<td><b>Texto</b></td>";
echo "<td><b>Introdução</b></td>";
echo "<td><b>Tema</b></td>";
echo "<td><b>Imagem</b></td>";
echo "<td><b>Usuário</b></td>";
echo "</tr>";
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
    echo "<td>" . $codMateria . "</td>";
    echo "<td>" . $nomeMateria . "</td>";
    echo "<td>" . $data . "</td>";
    echo "<td>" . $texto . "</td>";
    echo "<td>" . $introducao . "</td>";
    echo "<td>" . $tema . "</td>";
    echo "<td> <img src='$imagem' width='100' height='100' /> </td>";
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
    