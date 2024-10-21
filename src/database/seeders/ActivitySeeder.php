<?php
namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder {
    use WithoutModelEvents;

    public function run(): void
    {
        Activity::factory()->count(3)->create();
    }
}
