<?php
require_once('Transaction.php');
require_once('Block.php');
require_once('Blockchain.php');

$blockchain = new Blockchain(2); 


$blockchain->addBlock([
    new Transaction('abcdef1234567890abcdef1234567890abcdef12', 'abcdef1234567890abcdef1234567890abcdef13', 50),
    new Transaction('abcdef1234567890abcdef1234567890abcdef13', 'abcdef1234567890abcdef1234567890abcdef14', 30)
]);

$blockchain->addBlock([
    new Transaction('abcdef1234567890abcdef1234567890abcdef14', 'abcdef1234567890abcdef1234567890abcdef15', 20),
    new Transaction('abcdef1234567890abcdef1234567890abcdef15', 'abcdef1234567890abcdef1234567890abcdef16', 10)
]);

echo "Is blockchain valid? " . ($blockchain->isChainValid() ? "Yes" : "No") . "\n";
$blockchain->printBlockchain();

$address = 'abcdef1234567890abcdef1234567890abcdef14';
echo "Transaction history for address $address:\n";
$history = $blockchain->getTransactionHistory($address);
echo implode("\n", $history) . "\n";
