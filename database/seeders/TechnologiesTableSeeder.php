<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['HTML5', 'CSS3', 'JS ES6', 'PHP', 'Vue 3', 'Laravel 9', 'Bootstrap 5', 'Vite', 'Composer', 'Node.js', 'SCSS', 'React', 'Angular.js', 'C', 'C++', 'Python'];

        foreach ($technologies as $technologyName) {
            $technology = new Technology();
            $technology->name = $technologyName;
            $technology->slug = Str::slug($technologyName);
            $technology->text_color = $faker->unique()->hexColor();
            $technology->bg_color = $faker->unique()->hexColor();
            $technology->save();

            //modifico e aggiorno lo slug aggiungendo l'id dopo il nome
            $technology->slug = $technology->slug . "-$technology->id";
            $technology->update();
        }
    }

}
