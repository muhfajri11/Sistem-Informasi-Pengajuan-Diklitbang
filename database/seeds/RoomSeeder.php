<?php

use App\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = collect([
            [
                'name'  => 'IGD',
                'rate'  => 3
            ],
            [
                'name'  => 'Ruang Operasi',
                'rate'  => 3
            ],
            [
                'name'  => 'Ruang Melati',
                'rate'  => 1
            ],
            [
                'name'  => 'Ruang Isolasi',
                'rate'  => 2
            ]
        ]);

        $rooms->each(function($data){
            $room = Room::create($data);
        });
    }
}
