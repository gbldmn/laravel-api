<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            'pc',
            'iphone',
            'mac',
            'android',
            'tablet'
        ];


        foreach($technologies as $elem){
            $new_technology = new Technology();
            $new_technology->name = $elem;
            $new_technology->slug = Str::slug($new_technology->name);
            $new_technology->save();
        };
    }
}
