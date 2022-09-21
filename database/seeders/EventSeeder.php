<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->name = "First Event";
        $event->slug = Str::slug($event->name, '-');
        $event->save();
        $event = new Event();
        $event->name = "Second Event";
        $event->slug = Str::slug($event->name, '-');
        $event->save();
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            $event = new Event();
            $event->name = $faker->name;
            $event->slug = Str::slug($event->name, '-');
            $event->save();
        }
    }
}
