<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            'JS' => [
                'description' => 'JavaScript (JS) is a lightweight, interpreted, or just-in-time compiled programming language with first-class functions.',
                'url' => 'https://www.w3schools.com/jsrEF/default.asp',
                'category' => 'Frontend Technology',
            ],
            'Laravel' => [
                'description' => "Laravel is a web application framework with expressive, elegant syntax. We've already laid the foundation — freeing you to create without sweating the small things",
                'url' => 'https://laravel.com/',
                'category' => 'Backend Technology',
            ],
            'HTML' => [
                'description' => "Hypertext Markup Language, a standardized system for tagging text files to achieve font, colour, graphic, and hyperlink effects on World Wide Web pages.",
                'url' => 'https://www.w3schools.com/html/default.asp',
                'category' => 'Frontend Technology',
            ],
            'CSS' => [
                'description' => "CSS (Cascading Style Sheets) allows you to create great-looking web pages, but how does it work under the hood? This article explains what CSS is with a simple syntax example and also covers some key terms about the language.",
                'url' => 'https://www.w3schools.com/css/default.asp',
                'category' => 'Frontend Technology',
            ],
            'Sass' => [
                'description' => "Sass (short for syntactically awesome style sheets) is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets (CSS). SassScript is the scripting language itself.",
                'url' => 'https://sass-lang.com/',
                'category' => 'Frontend Technology',
            ],
            'VueJS' => [
                'description' => "An approachable, performant and versatile framework for building web user interfaces.",
                'url' => 'https://vuejs.org/',
                'category' => 'Frontend Technology',
            ],
            'React' => [
                'description' => "React lets you build user interfaces out of individual pieces called components. Create your own React components like Thumbnail, LikeButton, and Video.",
                'url' => 'https://react.dev/',
                'category' => 'Frontend Technology',
            ],
            'Angular' => [
                'description' => "Angular is a complete rewrite from the same team that built AngularJS. Angular is a Single Page Application (SPA) Framework which is used for creating Fast Web Applications.",
                'url' => 'https://angular.io/',
                'category' => 'Frontend Technology',
            ],
            'Svelte' => [
                'description' => "Svelte is a radical new approach to building user interfaces. Whereas traditional frameworks like React and Vue do the bulk of their work in the browser, Svelte shifts that work into a compile step that happens when you build your app.",
                'url' => 'https://svelte.dev/',
                'category' => 'Frontend Technology',
            ]
        ];

        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($technologies as $key => $technology) {
            $new_technology = new Technology();
            $new_technology->name = $key;
            $new_technology->slug = Str::slug($new_technology->name);
            foreach ($technology as $key => $value) {
                $new_technology->$key = $value;
            }

            $new_technology->save();
        }
    }
}
