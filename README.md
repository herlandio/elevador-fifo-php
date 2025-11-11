Elevador FIFO (PHP + SplQueue)

Implementação simples de um elevador que processa chamados por ordem de chegada (FIFO) usando SplQueue.

Faça o clone:
```
git clone https://github.com/herlandio/elevador-fifo-php.git
```

Requisitos

PHP ≥ 7.4 (ou superior)

Extensão SPL habilitada

Uso rápido

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