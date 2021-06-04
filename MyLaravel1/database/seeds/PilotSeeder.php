<?php

use Illuminate\Database\Seeder;

use App\Car;
use App\Pilot;

class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pilot::class, 10) -> create() -> each(function($pilot){

            $car = Car::inRandomOrder()
                    -> limit(rand(2, 5))
                    -> get();
            $pilot -> cars() -> attach($car);
            
            $pilot -> save();
        });
    }
}
