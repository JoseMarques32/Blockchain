<?php
class Blockchain {
    public $chain;
    
    public function __construct() {
        $this->chain = $this->createGenesisBlock();
    }

    public function createGenesisBlock() {
        return new Block([new Transaction('Genesis', 'Genesis', 0)], '0');
    }

    public function getLastBlock() {
        $currentBlock = $this->chain;
        while ($currentBlock->nextBlock != null) {
            $currentBlock = $currentBlock->nextBlock;
        }
        return $currentBlock;
    }

    public function addBlock($transactions) {
        $previousBlock = $this->getLastBlock();
        $newBlock = new Block($transactions, $previousBlock->hash);
        $previousBlock->addNextBlock($newBlock);
    }

    public function isChainValid() {
        $currentBlock = $this->chain;
        while ($currentBlock->nextBlock != null) {
            $nextBlock = $currentBlock->nextBlock;
            
            if ($nextBlock->previousHash !== $currentBlock->hash) {
                return false;
            }
            if ($nextBlock->hash !== $nextBlock->calculateHash()) {
                return false;
            }
            $currentBlock = $nextBlock;
        }
        return true;
    }

    public function printBlockchain() {
        $currentBlock = $this->chain;
        while ($currentBlock != null) {
            echo $currentBlock->toString() . "\n";
            $currentBlock = $currentBlock->nextBlock;
        }
    }
}
?>
