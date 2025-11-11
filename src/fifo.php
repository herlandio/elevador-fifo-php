<?php
declare(strict_types=1);

/**
 * Elevador FIFO usando SplQueue.
 * - filaChamados: fila FIFO de andares (SplQueue)
 * - andarAtual: inteiro (inicia em 0 — térreo)
 * - capacidade: inteiro (não usado na lógica de movimento neste exemplo)
 *
 * Métodos:
 * - __construct(int $capacidade)
 * - chamar(int $andar): void
 * - mover(): void
 * - getAndarAtual(): int
 * - getChamadosPendentes(): \SplQueue
 */
final class Elevador
{
    /** @var \SplQueue<int> */
    private \SplQueue $filaChamados;
    private int $andarAtual;
    private int $capacidade;

    public function __construct(int $capacidade)
    {
        if ($capacidade <= 0) {
            throw new \InvalidArgumentException('A capacidade deve ser maior que zero.');
        }

        $this->filaChamados = new \SplQueue();
        $this->andarAtual   = 0; // térreo
        $this->capacidade   = $capacidade;
    }

    public function chamar(int $andar): void
    {
        if ($andar < 0) {
            throw new \InvalidArgumentException('O andar deve ser >= 0.');
        }

        $this->filaChamados->enqueue($andar);
        echo "[CHAMADO] Andar {$andar} adicionado à fila.\n";
    }

    public function mover(): void
    {
        if ($this->filaChamados->isEmpty()) {
            echo "[INFO] Não há chamados pendentes.\n";
            return;
        }

        $proximoAndar = $this->filaChamados->dequeue();

        echo "[MOVIMENTO] Saindo do andar {$this->andarAtual} para o andar {$proximoAndar}...\n";
        $this->andarAtual = $proximoAndar;
        echo "[CHEGADA] Elevador no andar {$this->andarAtual}.\n";
    }

    public function getAndarAtual(): int
    {
        return $this->andarAtual;
    }

    /** @return \SplQueue<int> */
    public function getChamadosPendentes(): \SplQueue
    {
        return clone $this->filaChamados;
    }
}
