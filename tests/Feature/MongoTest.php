<?php

namespace Tests\Feature;


use App\Models\Restaurant;
use Tests\TestCase;

class MongoTest extends TestCase
{
    /** @test */
    public function can_get_from_atlas()
    {
        $restaurants = Restaurant::all();
        $this->markTestSkipped('wip');
    }

}
