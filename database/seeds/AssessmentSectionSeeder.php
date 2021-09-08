<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assessment_section')->delete();
        DB::table('assessment_section')->insert([
            [
                'label' => 'Beritahu aku tentang dirimu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'label' => 'Beritahu aku sisi positif mu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'label' => 'Beritahu aku sisi negatif mu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'label' => 'Pilih kelemahan mu',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
