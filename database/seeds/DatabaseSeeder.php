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
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RoomSeeder::class,
            InstitutionSeeder::class,
            SettingSeeder::class,
            AccountSeeder::class,
            TypeInternshipSeeder::class,

            EducationLevelSeeder::class,
            InstitutionProposerSeeder::class,
            OriginProposerSeeder::class,
            ResearchTypeSeeder::class,
            StatusProposerSeeder::class,

            ResearchFeeSeeder::class,
        ]);
    }
}
