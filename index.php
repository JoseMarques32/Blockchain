<?php
require_once('Transaction.php');
require_once('Block.php');
require_once('Blockchain.php');


$blockchain = new Blockchain();


$blockchain->addBlock([
    new Transaction('Cristiano Ronaldo', 'Messi', 50),
    new Transaction('Messi', 'Gabigol', 30)
]);

$blockchain->addBlock([
    new Transaction('Gabigol', 'Arrascaeta', 20),
    new Transaction('Arrascaeta', 'Pedro', 10)
]);


echo "Is blockchain valid? " . ($blockchain->isChainValid() ? "Yes" : "No") . "\n";
$blockchain->printBlockchain();
?>
