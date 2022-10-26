<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        if ($this->total < $price)
            return false;
        $tmpPrice = $price;
        while ($tmpPrice > 0 && !(empty($this->wallet)))
        {
            print("Here");
            
            $max = 0;
            for ($i=0; $i < count($this->wallet); $i++)
            {
                print($this->wallet[$i] . "\n");
                print(count($this->wallet) . " count\n");
                if (is_numeric($this->wallet[$i]))
                {
                    if ($max < $this->wallet[$i])
                    {
                        $max = $this->wallet[$i];
                    }
                }
            }
            $i2 = 0;
            while ($i2 < count($this->wallet) && $tmpPrice > 0)
            {   
                if (is_numeric($this->wallet[$i2]) && $this->wallet[$i2] == $max)
                {
                    print("Passed here");
                    $tmpPrice = $tmpPrice - $max;
                    unset($this->wallet[$i2]);
                }
                $i2++;
            }
        }
        $this->computeTotal();
        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
