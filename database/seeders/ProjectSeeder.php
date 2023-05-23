<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();


        for ($i = 0; $i < 10; $i++) {
            $type = Type::inRandomOrder()->first();

            $new_project = new Project();
            $new_project->type_id = $type->id;
            $new_project->project_name = $faker->sentence(2);
            $new_project->start_date = $faker->dateTime();
            $new_project->end_date = $faker->dateTimeInInterval($new_project->start_date, '+20 weeks');
            $new_project->revenues = $faker->randomFloat(2, 1000, 10000);
            $new_project->client = $faker->company();
            $new_project->project_summary = $faker->sentence();
            $new_project->is_completed = $faker->numberBetween(0, 1);
            $new_project->slug = Str::slug($new_project->project_name, '-');
            $new_project->save();
        }
    }
}
