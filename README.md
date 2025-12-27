# Banco PHP
Projeto de um Sistema Bancário simples desenvolvida PHP, com funcionalidades de criação de contas, depósitos, saques e transferências. Desenvolvido com orientação a objeto. 

## Funcionalidades
- Criar conta com dados do cliente

- Depositar valores

- Sacar valores com uso de limite

- Transferir entre contas

- Listar todas as contas criadas

## Estrutura

```
BancoPHP/                 
├── models/
│   ├── Cliente.php     # Classe que representa o cliente
│   └── Conta.php       # Classe que representa uma conta bancária     
├── Banco.php           # Menu principal com as operações do sistema
├── Teste.php           # Arquivo de testes e debug            
└── README.md           # Este arquivo
```

## Como Executar o Projeto

1. Certifique-se de ter o PHP instalado (versão 7.4 ou superior).
2. Clonar com Git, rode no terminal:
git clone https://github.com/beatrizalmc/sistema-bancario-em-php.git
cd sistema-bancario-em-php
3. Execute o sistema com:

```
php Banco.php
```

## Requisitos
- PHP 7.4+

- Terminal ou ambiente de execução CLI

## Melhorias futuras
Transformar esse projeto em uma aplicação web.


---
Feito com 💙 por Beatriz