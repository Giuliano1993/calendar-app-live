<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Calendar;
use App\Models\Appointment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $personal = [
            'doctor',
            'family visit',
            'free day',
            'child home'
        ];

        $work = [
            'call',
            'project deadline',
            'standout',
            'junior on-boarding'
        ];

        $social = [
            'live',
            'write article',
            'weekly post'
        ];

        $calendars = Calendar::all();
        $calendars = $calendars->toArray();
        for($i = 0; $i < 30; $i++){
            $appointment = new Appointment();
            $appointment->date = $faker->dateTimeBetween('-1 month', '+1 month');
            

            $startTime = $faker->time();
            $endTime = Carbon::createFromFormat('H:i:s', $startTime)->addHour();
            $appointment->time = $startTime;
            $appointment->endtime = $endTime;
            $appointment->description = $faker->sentence;
            $calendar = $faker->randomElement($calendars);
            $appointment->calendar_id = $calendar['id'];
            switch($calendar['name']){
                case 'Personal':
                    $calendarEvents = $personal;
                    break;
                case 'Work':
                    $calendarEvents = $work;
                    break;
                case 'Social':
                    $calendarEvents = $social;
                    break;
            }

            $appointment->title = $faker->randomElement($calendarEvents);

            $appointment->save();
        }
    }
}
