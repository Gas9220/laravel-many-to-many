<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $personal_type = new Type();
        $personal_type->name = 'Personal';
        $personal_type->slug = Str::slug($personal_type->name);
        $personal_type->description = 'Personal projects collection';
        $personal_type->save();

        $boolean_type = new Type();
        $boolean_type->name = 'Boolean';
        $boolean_type->slug = Str::slug($boolean_type->name);
        $boolean_type->description = 'Boolean course projects collection';
        $boolean_type->save();

        $client_type = new Type();
        $client_type->name = 'Client';
        $client_type->slug = Str::slug($client_type->name);
        $client_type->description = 'Clients projects collection';
        $client_type->save();

    }
}
