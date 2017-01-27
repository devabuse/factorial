<?php

class Factorial {
    private $amount;

    public function setAmount($amount)
    {
        if (!is_numeric($amount)) {
            throw new Exception('Not a number');
        }

        if ($amount < 0) {
            throw new Exception('Negative number');
        }

        $this->amount = $amount;
    }

    public function calculate()
    {
        $sequence = array_reverse(range(1, $this->amount - 1));
        $calculated = $this->amount;

        array_walk($sequence, function ($value) use (&$calculated) {
            $calculated = $calculated * $value;
        });

        return $calculated;
    }
}

try {
    $faculty = new Factorial();
    $faculty->setAmount(6);
    print $faculty->calculate() . "\n";
} catch(Exception $e) {
    print $e->getMessage() . "\n";
}

try {
    $faculty = new Factorial();
    $faculty->setAmount(-1);
    print $faculty->calculate() . "\n";
} catch(Exception $e) {
    print $e->getMessage() . "\n";
}

try {
    $faculty = new Factorial();
    $faculty->setAmount('!@#$');
    print $faculty->calculate() . "\n";
} catch(Exception $e) {
    print $e->getMessage() . "\n";
}
