<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReadingSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reading_sections')->insert([
            'question' => "The Alaska pipeline starts at the frozen edge of the Arctic Ocean. It stretches southward across the largest and northernmost state in the United States, ending at a remote ice-free seaport village nearly 800 miles from where it begins. It is massive in size and extremely complicated to operate.\nThe steel pipe crosses windswept plains and endless miles of delicate tundra that tops the frozen ground. It weaves through crooked canyons, climbs sheer mountains, plunges over rocky crags, makes its way through thick forests, and passes over or under hundreds of rivers and streams. The pipe is 4 feet in diameter, and up to 2 million barrels (or 84 million gallons) of crude oil can be pumped through it daily. Resting on H-shaped steel racks called " . "'bents, '" . "long sections of the pipeline follow a zigzag course high above the frozen earth. Other long sections drop out of sight beneath spongy or rocky ground and return to the surface later on. The pattern of the pipeline's up-and- down route is determined by the often harsh demands of the arctic and subarctic climate, the tortuous lay of the land, and the varied compositions of soil, rock, or permafrost (permanently frozen ground). A little more than half of the pipeline is elevated above the ground. The remainder is buried anywhere from 3 to 12 feet, depending largely upon the type of terrain and the properties of the soil. One of the largest in the world, the pipeline cost approximately $8 billion and is by far the biggest and most expensive construction project ever undertaken by private industry. In fact, no single business could raise that much money, so eight major oil companies formed a consortium in order to share the costs. Each company controlled oil rights to particular shares of land in the oil fields and paid into the pipeline-construction fund according to the size of its holdings. Today, despite enormous problems of climate, supply shortages, equipment breakdowns, labor disagreements, treacherous terrain, a certain amount of mismanagement, and even theft, the Alaska pipeline has been completed and is operating.",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
