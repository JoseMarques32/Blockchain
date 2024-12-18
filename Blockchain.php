<?php
class Blockchain {
    private $chain;
    private $difficulty;
    private $pendingTransactions;
    private $miningReward;
    private $balances;

    public function __construct($difficulty = 4, $miningReward = 50) {
        $this->chain = [];
        $this->difficulty = $difficulty;
        $this->pendingTransactions = [];
        $this->miningReward = $miningReward;
        $this->balances = [];

        
        $this->createGenesisBlock();
    }

    private function createGenesisBlock() {
        $genesisTransaction = new Transaction('SYSTEM', 'GENESIS', 0, 0);
        $genesisBlock = new Block(0, [$genesisTransaction], '0', $this->difficulty);
        $this->chain[] = $genesisBlock;
    }

    public function getLatestBlock() {
        return $this->chain[count($this->chain) - 1];
    }

    public function minePendingTransactions($minerAddress) {
       
        if (empty($this->pendingTransactions)) {
            echo "Não há transações pendentes para minerar.\n";
            return null;
        }

        
        $miningRewardTransaction = new Transaction(
            'SYSTEM', 
            $minerAddress, 
            $this->miningReward, 
            0
        );
        $this->pendingTransactions[] = $miningRewardTransaction;

        
        $previousBlock = $this->getLatestBlock();
        $newBlock = new Block(
            count($this->chain), 
            $this->pendingTransactions, 
            $previousBlock->hash, 
            $this->difficulty
        );

        
        $this->chain[] = $newBlock;

       
        $this->updateBalances($this->pendingTransactions);

        
        $this->pendingTransactions = [];

        return $newBlock;
    }

    public function createTransaction(Transaction $transaction) {
       
        if (!$this->isAddressValid($transaction->sender) || 
            !$this->isAddressValid($transaction->receiver)) {
            throw new Exception("Endereço inválido");
        }

        
        $senderBalance = $this->getBalance($transaction->sender);
        if ($senderBalance < ($transaction->amount + $transaction->fee)) {
            throw new Exception("Saldo insuficiente");
        }

        $this->pendingTransactions[] = $transaction;
        return count($this->pendingTransactions) - 1;
    }

    private function updateBalances($transactions) {
        foreach ($transactions as $tx) {
            
            if ($tx->sender !== 'SYSTEM') {
                $this->balances[$tx->sender] = 
                    ($this->balances[$tx->sender] ?? 0) - 
                    ($tx->amount + $tx->fee);
            }

            
            $this->balances[$tx->receiver] = 
                ($this->balances[$tx->receiver] ?? 0) + $tx->amount;
        }
    }

    public function getBalance($address) {
        return $this->balances[$address] ?? 0;
    }

    public function isAddressValid($address) {
        return $address === 'SYSTEM' || preg_match('/^[a-f0-9]{40}$/', $address);
    }

    public function setInitialBalance($address, $amount) {
        $this->balances[$address] = $amount;
    }

    public function isChainValid() {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

           
            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

           
            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }
        return true;
    }

    public function printBlockchain() {
        foreach ($this->chain as $block) {
            echo $block->toString() . "\n";
        }
    }

    public function getBlockchain() {
        return $this->chain;
    }
}
?>