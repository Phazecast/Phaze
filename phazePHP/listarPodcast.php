<meta charset="utf-8"/>
<?php
@session_start();

if (isset($_SESSION['nome'])and $_SESSION['permissao'] == 1) {

    include "conectaBanco.php";
// fazendo select do banco para salvar os valores em variaveis e jogar em uma tabela de html
    $todosPodcast = mysql_query("select * from podcast order by data_hora desc"); // salvo nesta variavel o que vier do banco
    $podcast = mysql_fetch_assoc($todosPodcast); // o que veio do banco em um vetor com a função mysql_fetch_assoc
// crio a tabela usando echo que escreve no html
    echo "<table align='center' border='1' width='80%'>";
    echo "<tr>";
    echo "<td><b>Nome do Podcast</b></td>";
    echo "<td><b>Texticulo</b></td>";
    echo "<td><b>Introdução</b></td>";
    echo "<td><b>Links do Post</b></td>";
    echo "<td><b>Tema</b></td>";
    echo "<td><b>Data</b></td>";
    echo "<td><b>Link do Player</b></td>";
    echo "<td><b>Imagem</b></td>";
    echo "</tr>";
    while ($podcast) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver podcast ele vai listar
        $codPodcast = $podcast['cod_do_podcast'];
        $nomePodcast = $podcast['nome_do_podcast'];
        $texticulo = $podcast['texticulo'];
        $introducao = $podcast['introducao'];
        $linkPost = $podcast['link_do_post'];
        $tema = $podcast['tema'];
        $linkPlayer = $podcast['link_do_player'];
        $imagem = $podcast['link_da_imagem'];
        $data = $podcast['data_hora'];

        echo "<tr>";
        echo "<td>" . $nomePodcast . "</td>";
        echo "<td>" . $texticulo . "</td>";
        echo "<td>" . $introducao . "</td>";
        echo "<td>" . $linkPost . "</td>";
        echo "<td>" . $tema . "</td>";
        echo "<td>" . $data . "</td>";
        echo "<td>" . $linkPlayer . "</td>";
        echo "<td> <img src='$imagem' width='100' height='100' /> </td>";
        echo "<td> <a href='excluirPodcast.php?codigoPodcast=$codPodcast'> Excluir</a> </td>"; // aqui estou mandando o codigo do podcast junto se caso clicar em excluir
        echo "</tr>";

// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
        $podcast = mysql_fetch_assoc($todosPodcast);
    }

    echo "</table>";
} else {
    
    header("location:phazeADM.php");
}
