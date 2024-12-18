<?php
require_once 'Transaction.php';
require_once 'Block.php';
require_once 'Blockchain.php';
require_once 'Node.php';


$blockchain = new Blockchain(4, 50);


$minerNode = new Node($blockchain, 'abcdef1234567890abcdef1234567890abcdef12');
$node1 = new Node($blockchain, 'abcdef1234567890abcdef1234567890abcdef13');
$node2 = new Node($blockchain, 'abcdef1234567890abcdef1234567890abcdef14');

$blockchain->setInitialBalance($minerNode->getAddress(), 1000);
$blockchain->setInitialBalance($node1->getAddress(), 500);
$blockchain->setInitialBalance($node2->getAddress(), 300);



try {
    
   
    $node1->createTransaction($node2->getAddress(), 50, 1);
    $minerNode->mineBlock();
   
   

    
    echo "Saldo Minerador: " . $minerNode->getBalance() . "\n";
    echo "Saldo Node 1: " . $node1->getBalance() . "\n";
    echo "Saldo Node 2: " . $node2->getBalance() . "\n";

    
    echo "Blockchain válida? " . 
        ($blockchain->isChainValid() ? "Sim" : "Não") . "\n";

   
    $blockchain->printBlockchain();

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
?>