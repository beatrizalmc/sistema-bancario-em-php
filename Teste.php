<?php

require_once __DIR__ . '/models/Cliente.php'; 
require_once __DIR__ . '/models/Conta.php';

// Criando cliente e conta
$felicity = new Cliente("Felicity Jones", "felicity@gmail.com", "123.456.789-00", "1987-09-02");
$contaf = new Conta($felicity);

// Testes de debug echo str_repeat("=", 50) . "\n"; 
echo "🔍 Testes de Debug\n"; 
echo str_repeat("-", 50) . "\n"; 
echo "Saldo: R$ " . number_format($contaf->getSaldo(), 2, ',', '.') . "\n"; 
echo "Limite: R$ " . number_format($contaf->getLimite(), 2, ',', '.') . "\n"; 
echo "Saldo Total: R$ " . number_format($contaf->getSaldoTotal(), 2, ',', '.') . "\n"; 
echo "Tipo do saldo_total: " . gettype($contaf->getSaldoTotal()) . "\n"; 
echo str_repeat("=", 50) . "\n\n"; 

echo "📄 Dados da Conta\n"; 
echo str_repeat("-", 50) . "\n"; 
echo $contaf . "\n"; 
echo str_repeat("=", 50) . "\n";
?>