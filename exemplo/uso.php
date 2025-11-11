<?php
require __DIR__ . '/../src/Elevador.php';

$elevador = new Elevador(6);
$elevador->chamar(3);
$elevador->chamar(7);
$elevador->chamar(1);

while (!$elevador->getChamadosPendentes()->isEmpty()) {
    $elevador->mover();
}

echo "Andar final: {$elevador->getAndarAtual()}\n";
