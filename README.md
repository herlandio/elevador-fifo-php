Elevador FIFO (PHP + SplQueue)

Implementação simples de um elevador que processa chamados por ordem de chegada (FIFO) usando SplQueue.

Requisitos

PHP ≥ 7.4 (ou superior)

Extensão SPL habilitada

Uso rápido

2) Exemplo mínimo

exemplo/uso.php
```
<?php
require __DIR__ . '/../src/fifo.php';

$elevador = new Elevador(6);
$elevador->chamar(3);
$elevador->chamar(7);
$elevador->chamar(1);

while (!$elevador->getChamadosPendentes()->isEmpty()) {
    $elevador->mover();
}

echo "Andar final: {$elevador->getAndarAtual()}\n";
```

Executar:

```
php exemplo/uso.php
```