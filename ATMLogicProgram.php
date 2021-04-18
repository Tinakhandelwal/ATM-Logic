<?php

Class ATM {
    public $balance, $withdrawAmount = 0;
    
    public function __construct($balance, $withdrawAmount) {
        $this->balance = $balance;
        $this->withdrawAmount = $withdrawAmount;
    }
    // Withdraw amount and update the balance
    public function amountWithdrawing($denominationArr) {
        echo nl2br("ATM Balance Amount : ". $this->balance."\n",false);
        echo nl2br("Withdraw Amount : ". $this->withdrawAmount."\n",false);
        if ($this->balance >= $this->withdrawAmount) {
            echo nl2br("Withdraw amount is available in the ATM \n",false);
            $this->balance = $this->balance - $this->withdrawAmount;
            echo nl2br("Remaining amount after withdraw: ".$this->balance."\n",false);
            // To check 500 note available in the ATM
            echo nl2br(in_array(500,$denominationArr) ? "500 Rs. note available in the ATM\n" : "500 Rs. note not available in the ATM\n");
            $this->denominationCheck($denominationArr, $this->withdrawAmount);
        } else {
            echo nl2br("Sorry! Insufficient Funds\n",false);
        }
        return $this->balance;
    }
    // Function to check denomination
    public function denominationCheck($denominationArr, $amount) {
        echo nl2br("Number of denominations for a given amount............................\n",false);
        $notAvailableArr = [];
        foreach($denominationArr as $key => $value) {
            $notes = floor($amount / $value);
            if ($notes) {
                $amount = $amount % $value; // remaining money
                echo nl2br("Note count = ".$notes.' Note of = '.$value.' Price =  '.($notes * $value)."\n",false);
            } else {
                $notAvailableArr = $value;
            }                
        }
    }
}
$atm = new ATM(20000, 6800);
$denominationArr = [2000, 500, 200, 100];
$atm->amountWithdrawing($denominationArr);
?>
