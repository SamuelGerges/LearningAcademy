<?php

use Illuminate\Database\Seeder;
use App\Models\SiteContent;
class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContent::create([
            'name'    => 'E-Train',
            'content' => json_encode([
                'title'     =>'E-Train',
                'desc' =>'But when shot real her. Chamber her one visite removal six sending himself
                    boys scot exquisite existend an
                    But when shot real her hamPer her',
            ]),
        ]);
    }
}
