<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotes')->delete();
        DB::table('quotes')->insert([
            [
                'text' => 'The cost of being wrong is less than the cost of doing nothing.',
                'writer' => 'Seth Godin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'We cannot solve our problems with the same thinking we used when we created them.',
                'writer' => 'Albert Einstein',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'I found that with depression, one of the most important things you can realize is that you’re not alone. You’re not the first to go through it, you’re not gonna be the last to go through it.',
                'writer' => 'Dwayne “The Rock” Johnson',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'The humanity we all share is more important than the mental illnesses we may not.',
                'writer' => 'Elyn R. Saks',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'If you are broken, you do not have to stay broken.',
                'writer' => 'Selena Gomez',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'Tough times never last, but tough people do!',
                'writer' => 'Robert Schuller',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'Happiness can be found even in the darkest of times, if one only remembers to turn on the light.',
                'writer' => 'Albus Dumbledore',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'Promise me you’ll always remember — you’re braver than you believe, and stronger than you seem, and smarter than you think.',
                'writer' => 'Christopher Robin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'text' => 'In any given moment, we have two options: to step forward into growth or to step back into safety.',
                'writer' => 'Abraham Maslow',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
