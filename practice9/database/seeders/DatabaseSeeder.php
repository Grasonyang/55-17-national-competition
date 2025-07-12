<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\task_type;
use App\Models\worker;
use App\Models\task;
use App\Models\task_input;
use App\Models\task_output;
use App\Models\task_type_input;
use App\Models\task_type_output;
use App\Models\user_quota_transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Clear existing data in reverse dependency order
        user_quota_transaction::truncate();
        task_input::truncate();
        task_output::truncate();
        task::truncate();
        DB::table('worker_task_types')->truncate();
        worker::truncate();
        task_type_input::truncate();
        task_type_output::truncate();
        task_type::truncate();
        User::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create admin user
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'nickname' => 'Admin',
            'type' => 'ADMIN',
        ]);

        // Create regular users
        $users = User::factory(10)->create();

        // Create task types with their input/output definitions
        $taskTypes = task_type::factory(5)->create();
        
        foreach ($taskTypes as $taskType) {
            // Create input definitions for each task type
            task_type_input::factory(2)->create([
                'task_type_id' => $taskType->id,
            ]);
            
            // Create output definitions for each task type
            task_type_output::factory(2)->create([
                'task_type_id' => $taskType->id,
            ]);
        }

        // Create workers
        $workers = worker::factory(8)->create();

        // Associate workers with task types (many-to-many)
        foreach ($workers as $worker) {
            $worker->task_types()->attach(
                $taskTypes->random(rand(1, 3))->pluck('id')->toArray()
            );
        }

        // Create tasks
        $tasks = task::factory(50)->create([
            'task_type_id' => fn() => $taskTypes->random()->id,
            'user_id' => fn() => $users->random()->id,
            'worker_id' => fn() => rand(0, 1) ? $workers->random()->id : null,
        ]);

        // Create task inputs and outputs for finished tasks
        foreach ($tasks->where('status', 'finished') as $task) {
            // Create inputs
            task_input::factory(2)->create([
                'task_id' => $task->id,
            ]);
            
            // Create outputs
            task_output::factory(2)->create([
                'task_id' => $task->id,
            ]);
        }

        // Create user quota transactions
        foreach ($users as $user) {
            // Initial quota for new user
            user_quota_transaction::factory()->createUser()->create([
                'user_id' => $user->id,
            ]);
            
            // Some recharge transactions
            for ($i = 0; $i < rand(1, 3); $i++) {
                user_quota_transaction::factory()->recharge()->create([
                    'user_id' => $user->id,
                ]);
            }
            
            // Some consume transactions
            for ($i = 0; $i < rand(2, 5); $i++) {
                user_quota_transaction::factory()->consume()->create([
                    'user_id' => $user->id,
                ]);
            }
        }

        // Admin quota transactions
        user_quota_transaction::factory()->createUser()->create([
            'user_id' => $admin->id,
        ]);
        for ($i = 0; $i < 3; $i++) {
            user_quota_transaction::factory()->recharge()->create([
                'user_id' => $admin->id,
            ]);
        }
    }
}
