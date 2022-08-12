<?php

use Illuminate\Database\Seeder;
use App\Models\Trainer;
class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'Karim Fouad',
            'phone' => '01143043965',
            'spec' => ' Web development',
            'image' => '1.jpg'
        ]);
        Trainer::create([
            'name' => 'Ahmed Hassan',
            'phone' => '01143043965',
            'spec' => ' Web development',
            'image' => '2.jpg'
        ]);
        Trainer::create([
            'name' => 'Beater Ibrahim',
            'phone' => '01143043965',
            'spec' => 'Dentist',
            'image' => '3.jpg'
        ]);
        Trainer::create([
            'name' => 'Ayman Hany',
            'phone' => '01143043965',
            'spec' => 'Doctor',
            'image' => '4.jpg'
        ]);
        Trainer::create([
            'name' => 'Karim Hassan',
            'phone' => '01143043965',
            'spec' => 'English Teacher',
            'image' => '5.jpg'
        ]);
    }
}
