<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testlogar()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'usuario');
        $this->assertEquals('usuario', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('usuario', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}

?>
