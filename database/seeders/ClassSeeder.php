<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Sections;
use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
        ->count(10)
        ->sequence(fn($sequence)=>['name'=>'Class '. $sequence->index+1]) 
        ->has(
            Sections::factory()
            ->count(2)
            ->state(
                new Sequence(
                    ['name'=>'Section A'],
                    ['name'=>'Section B']
                )
            )
            ->has(
                Students::factory()
                ->count(5)
                ->state(
                    function (array $attributes,Sections $section) {
                        return ['class_id'=>$section->class_id];
                    }
                )

            )
                )
->create();
    }

    
}
// 23
