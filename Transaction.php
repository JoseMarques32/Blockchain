<?php
class Transaction {
    public $sender;
    public $receiver;
    public $amount;
    public $fee;
    public $timestamp;

    public function __construct($sender, $receiver, $amount, $fee = 0) {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->amount = $amount;
        $this->fee = $fee;
        $this->timestamp = time();
    }

    public function toString() {
        return "{$this->sender} -> {$this->receiver}: {$this->amount} (Fee: {$this->fee})";
    }

    public function getHash() {
        return hash('sha256', 
            $this->sender . 
            $this->receiver . 
            $this->amount . 
            $this->fee . 
            $this->timestamp
        );
    }
}
?>