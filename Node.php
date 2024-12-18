<?php
class Node {
    private $blockchain;
    private $address;

    public function __construct(Blockchain $blockchain, $address) {
        $this->blockchain = $blockchain;
        $this->address = $address;
    }

    public function createTransaction($receiver, $amount, $fee = 0) {
        $transaction = new Transaction($this->address, $receiver, $amount, $fee);
        return $this->blockchain->createTransaction($transaction);
    }

    public function mineBlock() {
        return $this->blockchain->minePendingTransactions($this->address);
    }

    public function getBalance() {
        return $this->blockchain->getBalance($this->address);
    }

    public function getAddress() {
        return $this->address;
    }
}
?>