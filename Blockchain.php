<?php
class Blockchain {
    public $chain;
    public $difficulty;

    public function __construct($difficulty = 2) {
        $this->difficulty = $difficulty;
        $this->chain = $this->createGenesisBlock();
    }

    public function createGenesisBlock() {
        return new Block([new Transaction('Genesis', 'Genesis', 0)], '0', $this->difficulty);
    }

    public function getLastBlock() {
        $currentBlock = $this->chain;
        while ($currentBlock->nextBlock != null) {
            $currentBlock = $currentBlock->nextBlock;
        }
        return $currentBlock;
    }

    public function addBlock($transactions) {
        foreach ($transactions as $tx) {
            if (!$this->isAddressValid($tx->sender) || !$this->isAddressValid($tx->receiver)) {
                echo "Invalid address.\n";
                return;
            }
        }
        $previousBlock = $this->getLastBlock();
        $newBlock = new Block($transactions, $previousBlock->hash, $this->difficulty);
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

    public function isAddressValid($address) {
        return preg_match('/^[a-f0-9]{40}$/', $address); 
    }

    public function getTransactionHistory($address) {
        $history = [];
        $currentBlock = $this->chain;

        while ($currentBlock != null) {
            foreach ($currentBlock->transactions as $tx) {
                if ($tx->sender === $address || $tx->receiver === $address) {
                    $history[] = $tx->toString();
                }
            }
            $currentBlock = $currentBlock->nextBlock;
        }
        return $history;
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