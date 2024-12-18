<?php
class Block {
    public $index;
    public $timestamp;
    public $transactions;
    public $previousHash;
    public $hash;
    public $nonce;
    public $difficulty;

    public function __construct($index, $transactions, $previousHash = '', $difficulty = 4) {
        $this->index = $index;
        $this->timestamp = time();
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->difficulty = $difficulty;
        $this->nonce = 0;
        $this->hash = $this->mineBlock();
    }

    public function calculateHash() {
        $transactionsString = implode('', array_map(function($tx) {
            return $tx->getHash();
        }, $this->transactions));

        return hash('sha256', 
            $this->index . 
            $this->previousHash . 
            $this->timestamp . 
            $transactionsString . 
            $this->nonce
        );
    }

    public function mineBlock() {
        $target = str_repeat('0', $this->difficulty);
        
        while (substr($hash = $this->calculateHash(), 0, $this->difficulty) !== $target) {
            $this->nonce++;
        }
        
        return $hash;
    }

    public function toString() {
        $txs = array_map(function($tx) {
            return $tx->toString();
        }, $this->transactions);

        return "Block #" . $this->index . 
               "\nHash: " . $this->hash . 
               "\nPrevious Hash: " . $this->previousHash . 
               "\nNonce: " . $this->nonce . 
               "\nTransactions: " . implode(', ', $txs) . "\n";
    }
}
?>