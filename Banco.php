<?php

require_once __DIR__ . '/models/Cliente.php'; 
require_once __DIR__ . '/models/Conta.php';

$contas = [];

function main() {
    menu();
}

function menu() {
    global $contas;

    echo "===========================================\n";
    echo "=================== ATM ===================\n";
    echo "================= Alm Bank ================\n";
    echo "===========================================\n";

    echo "Selecione uma opção no menu: \n";
    echo "1- Criar conta\n";
    echo "2- Efetuar saque\n";
    echo "3- Efetuar depósito\n";
    echo "4- Efetuar transferência\n";
    echo "5- Listar contas\n";
    echo "6- Sair do sistema\n";

    $opcao = intval(readline("Opção: "));

    switch ($opcao) {
        case 1:
            criarConta();
            break;
        case 2:
            efetuarSaque();
            break;
        case 3:
            efetuarDeposito();
            break;
        case 4:
            efetuarTransferencia();
            break;
        case 5:
            listarContas();
            break;
        case 6:
            echo "Volte sempre!\n";
            exit();
        default:
            echo "Opção inválida\n";
            exit();
    }
}

function criarConta() {
    global $contas;

    echo "Informe os dados do cliente \n";
    $nome = readline("Nome do cliente: ");
    $email = readline("E-mail do cliente: ");
    $cpf = readline("CPF do cliente: ");
    $dataNascimento = readline("Data de nascimento do cliente (YYYY-MM-DD): ");

    $cliente = new Cliente($nome, $email, $cpf, $dataNascimento);
    $conta = new Conta($cliente);

    $contas[] = $conta;

    echo "Conta criada com sucesso.\n";
    echo "Dados da conta:\n";
    echo "-------------------------\n";
    echo $conta . "\n";

    $acao = readline("Deseja realizar outra ação? S/N "); 
    if (strtoupper($acao) === 'S') { 
        menu();
    } else {
        echo "Obrigado por usar o BancoPHP. Volte sempre!\n"; 
        exit();
    }
}

function efetuarSaque() {
    global $contas;

    if (count($contas) > 0) {
        $numero = intval(readline("Informe o número da sua conta: "));
        $conta = buscarContaPorNumero($numero);

        if ($conta) {
            $valor = floatval(readline("Informe o valor do saque: "));
            $conta->sacar($valor);
        } else {
            echo "Não foi encontrada a conta com número {$numero}\n";
        }
    } else {
        echo "Ainda não existem contas cadastradas.\n";
    }
    menu();
}

function efetuarDeposito() {
    global $contas;

    if (count($contas) > 0) {
        $numero = intval(readline("Informe o número da sua conta: "));
        $conta = buscarContaPorNumero($numero);

        if ($conta) {
            $valor = floatval(readline("Informe o valor do depósito: "));
            $conta->depositar($valor);
        } else {
            echo "Não foi encontrada a conta com número {$numero}\n";
        }
    } else {
        echo "Ainda não existem contas cadastradas.\n";
    }
    menu();
}

function efetuarTransferencia() {
    global $contas;

    if (count($contas) > 0) {
        $numeroOrigem = intval(readline("Informe o número da sua conta: "));
        $contaOrigem = buscarContaPorNumero($numeroOrigem);

        if ($contaOrigem) {
            $numeroDestino = intval(readline("Informe o número da conta de destino: "));
            $contaDestino = buscarContaPorNumero($numeroDestino);

            if ($contaDestino) {
                $valor = floatval(readline("Informe o valor da transferência: "));
                $contaOrigem->transferir($contaDestino, $valor);
            } else {
                echo "A conta destino com número {$numeroDestino} não foi encontrada\n";
            }
        } else {
            echo "A sua conta com número {$numeroOrigem} não foi encontrada\n";
        }
    } else {
        echo "Ainda não existem contas cadastradas.\n";
    }
    menu();
}

function listarContas() {
    global $contas;

    if (count($contas) > 0) {
        echo "Listagem de contas:\n";
        foreach ($contas as $conta) {
            echo $conta . "\n";
            echo "---------------------------\n";
        }
    } else {
        echo "Não existem contas cadastradas.\n";
    }
    
    $acao = readline("Deseja realizar outra ação? S/N "); 
    if (strtoupper($acao) === 'S') { 
        menu();
    } else {
        echo "Obrigado por usar o Alm Bank. Volte sempre!\n"; 
        exit();
    }
}

function buscarContaPorNumero(int $numero) {
    global $contas;

    foreach ($contas as $conta) {
        if ($conta->getNumero() === $numero) {
            return $conta;
        }
    }
    return null;
}

// Executa o programa
main();

?>