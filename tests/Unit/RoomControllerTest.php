<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Http\Controllers\RoomsController;

class RoomControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $classA = new RoomsController();
        $classA->addRoom();
    
        $this->assertTrue(true);
    }
}
