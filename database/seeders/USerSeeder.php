
<?php
    use App\Models\User;
    use Database\Seeders;

    class UserSeeder extends Seeder
    {
        public function run()
        {
            User::factory(10)->create(); 
        }
    }
