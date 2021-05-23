<?php
namespace ComplexNumbers;

class ComplexNumbers {
    public $a, $b;

    public function __construct($a, $b) {
        $this -> a = $a;
        $this -> b = $b;
    }

    public function __toString(): string {
        return "({$this -> a},{$this -> b})";
    }

    public function add(ComplexNumbers $complex) {
        $this -> a += $complex -> a;
        $this -> b += $complex -> b;
    }

    public function sub($number) {
        $this -> a *= $number;
        $this -> b *= $number;
    }

    public function div(ComplexNumbers $complex): string {
        $c = $this -> a;

        if (($complex -> a != 0 and $complex -> b != 0)) {
            $this -> a = ($this -> a * $this -> b + $complex -> a * $complex -> b)/(pow($this -> b, $this->b) + pow($complex -> b, $complex -> b));
            $this -> b = ($complex -> a * $this -> b - $c * $complex -> b)/(pow($this -> b, $this -> b) + pow($complex -> b, $complex -> b));
        } else {
            return "Нельзя делить на 0!";
        }
    }

    public function mult(ComplexNumbers $complex) {
        $c = $this -> a;
        $this -> a = $this -> a * $this -> b - $complex -> a * $complex -> b;
        $this -> b = $c * $complex -> b + $complex -> a * $this -> b;
    }

    public function abs(): float {
        return sqrt(pow($this -> a, $this -> a) + pow($this -> b, $this -> b));
    }
}