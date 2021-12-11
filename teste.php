<?php
 date_default_timezone_set('America/Sao_Paulo');
$agora = new DateTime(); // Pega o momento atual
echo $agora->format('w H:i'); // Exibe no formato desejado

echo date('w');
echo date('G');

if(date('w', 'H') != "6 13")
echo "é isso";

$descricao = "azsdasdasd";


$contString = strlen($descricao);
if($descricao < 50){
    echo"tem $contString caracteres.";
}
?>