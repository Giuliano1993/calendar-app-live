<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calendars = [
            ['name'=>'Personal',
            'description'=>'My personal appointmens'],
            ['name'=>'Work',
            'description'=>'My work appointmens'],
            ['name'=>'Social',
            'description'=>'My social content calendar'],
        ];

        foreach($calendars as $c){
            $calendar = new Calendar();
            $calendar->name = $c['name'];
            $calendar->description = $c['description'];

            $calendar->save();
        }
    }
}
