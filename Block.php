<?php
class Block {
    public $previousHash;
    public $transactions;
    public $timestamp;
    public $hash;
    public $nextBlock = null; 

    public function __construct($transactions, $previousHash = '') {
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->timestamp = time();
        $this->hash = $this->calculateHash();
    }

    public function calculateHash() {
        return hash('sha256', $this->previousHash . $this->timestamp . serialize($this->transactions));
    }

    public function addNextBlock($block) {
        $this->nextBlock = $block;
    }

    public function toString() {
        $txs = array_map(function($tx) {
            return $tx->toString();
        }, $this->transactions);
        return "Block: " . $this->hash . "\nPrevious Hash: " . $this->previousHash . "\nTransactions: " . implode(', ', $txs) . "\n";
    }
}
?>
