<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(InterestSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ReminderSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(AssessmentsSeeder::class);
        $this->call(AssessmentSectionSeeder::class);
        $this->call(QuotesSeeder::class);
    }
}
