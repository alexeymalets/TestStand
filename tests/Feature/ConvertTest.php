<?php

namespace Tests\Feature;

use App\Models\Type;
use App\Models\User;
use App\Models\Win;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testConvert()
    {
        $this->seed();

        $user = User::factory()->create();

        for($a = 0; $a < 10; $a++) {
            $this->actingAs($user)->get(route('lottery'));
        }


        foreach ($user->wins as $win){
            if($win->type->name == 'money') {

                $bonus = $user->bonus;

                $this->actingAs($user)->get(route('convert', $win));
                print_r($user->bonus);

                if($user->bonus != ($bonus+$win->value*(10))){
                    $this->assertTrue(false);
                }
            }
        }

        $this->assertTrue(true);
    }
}
