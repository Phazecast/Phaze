<meta charset="utf-8"/>
<?php
@session_start();

if (isset($_SESSION['nome'])and $_SESSION['permissao'] == 1) 
{
    include "conectaBanco.php";

    // fazendo select do banco para salvar os valores em variaveis e jogar em uma tabela de html
    $todosPodcast = mysql_query("select * from podcast order by data_hora desc"); // salvo nesta variavel o que vier do banco
    
    // o que veio do banco em um vetor com a função mysql_fetch_assoc
    $podcast = mysql_fetch_assoc($todosPodcast);
    
    // crio a tabela usando echo que escreve no html
    echo "<table align='center' border='1' width='90%' class='pure-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Imagem</th>";
    echo "<th>Nome do Podcast</th>";
    echo "<th>Texticulo</th>";
    echo "<th>Introdução</th>";
    echo "<th>Links do Post</th>";
    echo "<th>Tema</th>";
    echo "<th>Data</th>";
    echo "<th>Link do Player</th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</thead>";
    
    // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver podcast ele vai listar
    while ($podcast) { 
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
        echo "<td> <img src='../$imagem' width='100' height='100' /> </td>";
        echo "<td>" . $nomePodcast . "</td>";
        echo "<td>" . $texticulo . "</td>";
        echo "<td>" . $introducao . "</td>";
        echo "<td>" . $linkPost . "</td>";
        echo "<td>" . $tema . "</td>";
        echo "<td>" . $data . "</td>";
        echo "<td>" . $linkPlayer . "</td>";
        // aqui estou mandando o codigo do podcast junto se caso clicar em excluir
        echo "<td> <a href='excluirPodcast.php?codigoPodcast=$codPodcast'> Excluir</a> </td>"; 
        echo "</tr>";

        // chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
        $podcast = mysql_fetch_assoc($todosPodcast);
    }

    echo "</table>";
} 
else 
{
    header("location:phazeADM.php");
}
