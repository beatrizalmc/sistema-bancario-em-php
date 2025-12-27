<?php

require_once 'Cliente.php'; // importando a classe Cliente

class Conta {
    private static int $codigo = 1001;

    private int $numero;
    private Cliente $cliente;
    private float $saldo;
    private float $limite;
    private float $saldoTotal;

    public function __construct(Cliente $cliente) {
        $this->numero = self::$codigo;
        $this->cliente = $cliente;
        $this->saldo = 0.0;
        $this->limite = 100.0;
        $this->saldoTotal = $this->calculaSaldoTotal();
        self::$codigo++;
    }

    public function __toString(): string {
        return "Número da conta: {$this->getNumero()} \n" .
               "Cliente: {$this->cliente->getNome()} \n" .
               "Saldo total: " . $this->formataFloatMoeda($this->getSaldoTotal());
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function getCliente(): Cliente {
        return $this->cliente;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function setSaldo(float $valor): void {
        $this->saldo = $valor;
    }

    public function getLimite(): float {
        return $this->limite;
    }

    public function setLimite(float $valor): void {
        $this->limite = $valor;
    }

    public function getSaldoTotal(): float {
        return $this->saldoTotal;
    }

    public function setSaldoTotal(float $valor): void {
        $this->saldoTotal = $valor;
    }

    private function calculaSaldoTotal(): float {
        return $this->saldo + $this->limite;
    }

    // Métodos de operação
    public function depositar(float $valor): void {
        if ($valor > 0) {
            $this->saldo += $valor;
            $this->saldoTotal = $this->calculaSaldoTotal();
            echo "Depósito efetuado com sucesso!\n";
        } else {
            echo "Erro ao efetuar depósito. Tente novamente.\n";
        }
    }

    public function sacar(float $valor): void {
        if ($valor > 0 && $this->saldoTotal >= $valor) {
            if ($this->saldo >= $valor) {
                $this->saldo -= $valor;
            } else {
                $restante = $this->saldo - $valor;
                $this->limite += $restante;
                $this->saldo = 0;
            }
            $this->saldoTotal = $this->calculaSaldoTotal();
            echo "Saque efetuado com sucesso!\n";
        } else {
            echo "Erro ao efetuar saque. Tente novamente.\n";
        }
    }

    public function transferir(Conta $destino, float $valor): void {
        if ($valor > 0 && $this->saldoTotal >= $valor) {
            if ($this->saldo >= $valor) {
                $this->saldo -= $valor;
            } else {
                $restante = $this->saldo - $valor;
                $this->saldo = 0;
                $this->limite += $restante;
            }
            $this->saldoTotal = $this->calculaSaldoTotal();

            $destino->setSaldo($destino->getSaldo() + $valor);
            $destino->setSaldoTotal($destino->calculaSaldoTotal());

            echo "Transferência realizada com sucesso!\n";
        } else {
            echo "Erro ao efetuar transferência. Tente novamente.\n";
        }
    }

    // Helper para formatar valores monetários
    private function formataFloatMoeda(float $valor): string {
        return "R$ " . number_format($valor, 2, ',', '.');
    }
}

?>