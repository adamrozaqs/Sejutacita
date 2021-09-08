<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reminders')->delete();
        DB::table('reminders')->insert([
            [
                'title' => 'Gratitude',
                'desc' => 'Be thankful for what you have, you’ll end up having more.If you concentrate on what you don’t have, you will never, ever have enough.',
                'pushtime' => '09:00:00',
                'type' => 'gratitude',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Self Love',
                'desc' => 'You were born to stand out. Stop trying to fit in.',
                'pushtime' => '10:00:00',
                'type' => 'self_love',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Emotional',
                'desc' => 'Make happiness a priorty and be gentle with yourself in the process.',
                'pushtime' => '11:00:00',
                'type' => 'emotional',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Impactful',
                'desc' => 'Everyone you meet is fighting a battle you know nothing about. always be kind.',
                'pushtime' => '12:00:00',
                'type' => 'impactful',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Make it happen',
                'desc' => 'To change the way you feel. change the way you think, be mindful of what you think, feel and want. live your life in ways that truly reflect this.',
                'pushtime' => '13:00:00',
                'type' => 'impactful',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
