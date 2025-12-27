<?php

class Cliente {
    private static int $contador = 101;

    private int $codigo;
    private string $nome;
    private string $email;
    private string $cpf;
    private DateTime $dataNascimento;
    private DateTime $dataCadastro;

    public function __construct(string $nome, string $email, string $cpf, string $dataNascimento) {
        $this->codigo = self::$contador;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->dataNascimento = DateTime::createFromFormat('Y-m-d', $dataNascimento);
        $this->dataCadastro = new DateTime();
        self::$contador++;
    }

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getDataNascimento(): string {
        return $this->dataNascimento->format('d/m/Y');
    }

    public function getDataCadastro(): string {
        return $this->dataCadastro->format('d/m/Y');
    }

    public function __toString(): string {
        return "Código: {$this->getCodigo()} \n" .
               "Nome: {$this->getNome()} \n" .
               "Data de Nascimento: {$this->getDataNascimento()} \n" .
               "Cadastro: {$this->getDataCadastro()}";
    }
}

?>