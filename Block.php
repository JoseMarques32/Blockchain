<?php
class Block {
    public $previousHash;
    public $transactions;
    public $timestamp;
    public $hash;
    public $nextBlock = null;
    public $nonce;
    public $difficulty;

    public function __construct($transactions, $previousHash = '', $difficulty = 2) {
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->timestamp = time();
        $this->difficulty = $difficulty;
        $this->nonce = 0;
        $this->mineBlock();
    }

    public function calculateHash() {
        return hash('sha256', $this->previousHash . $this->timestamp . $this->nonce . serialize($this->transactions));
    }

    public function mineBlock() {
        $target = str_repeat('0', $this->difficulty);
        while (substr($this->hash = $this->calculateHash(), 0, $this->difficulty) !== $target) {
            $this->nonce++;
        }
    }

    public function addNextBlock($block) {
        $this->nextBlock = $block;
    }

    public function toString() {
        $txs = array_map(function($tx) {
            return $tx->toString();
        }, $this->transactions);
        return "Block: " . $this->hash . "\nPrevious Hash: " . $this->previousHash . "\nNonce: " . $this->nonce . "\nTransactions: " . implode(', ', $txs) . "\n";
    }
}
?>