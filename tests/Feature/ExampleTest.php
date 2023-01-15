<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function can_reverse_int()
    {
        $num = 12345;

        $reversed = 0;
        while ($num > 0) {
            $remainder = $num % 10;
            $reversed = ($reversed * 10) + $remainder;

            $num = $num / 10;
        }
        echo $reversed;

    }

    /** @test */
    public function can_match_chars()
    {
        $word = 'Treemazing';
        $chars = 'Tree';

        $returned = $this->match_first_chars($word, $chars);

        $this->assertTrue($returned);
    }

    private function match_first_chars($word, $chars)
    {
        $first_chars = substr($word, 0, strlen($chars));

        if ($first_chars == $chars) {
            return true;
        } else {
            return false;
        }
    }
}
