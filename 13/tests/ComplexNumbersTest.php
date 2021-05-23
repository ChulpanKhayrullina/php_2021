<?php
require_once __DIR__ . "/../app/ComplexNumbers.php";

use PHPUnit\Framework\TestCase;
use ComplexNumbers\ComplexNumbers;

class ComplexNumbersTest extends TestCase {
    public function testToString() {
        $complex = new ComplexNumbers(42, 2);
        $this -> assertEquals("(42,2)", $complex -> __toString());
    }

    public function testDivZero() {
        $complex = new ComplexNumbers(42, 2);
        $this -> assertEquals('Нельзя делить на 0!', $complex -> div(new ComplexNumbers(0, 0)));
    }

    public function testAddCorrect() {
        $complex = new ComplexNumbers(42, 2);
        $complex -> add(new ComplexNumbers(2, -14));
        $this -> assertEquals("(44,-12)", $complex -> __toString());
    }

    public function testAddIncorrect() {
        $complex = new ComplexNumbers(42, 2);
        $complex -> add(new ComplexNumbers(2, -14));
        $this -> assertTrue("(42,12)" != $complex -> __toString());
    }

    public function testSubCorrect() {
        $complex = new ComplexNumbers(42, 2);
        $complex -> sub(5);
        $this -> assertTrue("(210,10)" == $complex -> __toString());
    }

    public function testSubIncorrect() {
        $complex = new ComplexNumbers(42, 2);
        $complex -> sub(5);
        $this -> assertFalse("(242,14)" == $complex -> __toString());
    }

    public function testDivCorrect() {
        $complex = new ComplexNumbers(1, 5);
        $complex -> div(new ComplexNumbers(2, 6));
        $this -> assertEquals("(0.8,0.1)", $complex -> __toString());
    }

    public function testDivIncorrect() {
        $complex = new ComplexNumbers(9, 1);
        $complex -> div(new ComplexNumbers(9, 8));
        $this -> assertNotSame("(0,1)", $complex -> __toString());
    }

    public function testMultCorrect() {
        $complex = new ComplexNumbers(10, 2);
        $complex -> mult(new ComplexNumbers(2, -10));
        $this -> assertEquals("(40,-96)", $complex -> __toString());
    }

    public function testMultIncorrect() {
        $complex = new ComplexNumbers(10, 2);
        $complex -> mult(new ComplexNumbers(2, -10));
        $this -> assertFalse("(100,80)" == $complex -> __toString());
    }

    public function testAbsCorrect() {
        $complex = new ComplexNumbers(0, 0);
        $this -> assertIsFloat($complex -> abs());

    }

    public function testAbsIncorrect() {
        $complex = new ComplexNumbers(0, 42);
        $this -> assertNotSame('42', $complex -> abs());
    }

}