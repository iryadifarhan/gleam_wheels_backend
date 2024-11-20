<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'place_id' => "1",
                'user_id' => "1",
                'username' => "Rick",
                'service' => "Full Car Wash",
                'dates' => json_encode(['2024-11-24T14:00:00Z']),
                'queueNumber' => 1,
                'price' => 45000,
            ],
            [
                'place_id' => "1",
                'user_id' => "2",
                'username' => "Morty",
                'service' => "Detailing",
                'dates' => json_encode(['2024-11-24T16:30:00Z']),
                'queueNumber' => 2,
                'price' => 1100000,
            ],
            [
                'place_id' => "3",
                'user_id' => "1",
                'username' => "Rick",
                'service' => "Interior",
                'dates' => json_encode(['2024-11-25T10:00:00Z']),
                'queueNumber' => 1,
                'price' => 300000,
            ],
            [
                'place_id' => "4",
                'user_id' => "2",
                'username' => "Morty",
                'service' => "Coating",
                'dates' => json_encode(['2024-11-25T11:30:00Z', '2024-11-26T11:30:00Z']),
                'queueNumber' => 1,
                'price' => 2000000,
            ],
            [
                'place_id' => "6",
                'user_id' => "1",
                'username' => "Rick",
                'service' => "Paint Protection Film",
                'dates' => json_encode(['2024-11-26T13:00:00Z', '2024-11-27T13:00:00Z', '2024-11-28T13:00:00Z']),
                'queueNumber' => 1,
                'price' => 20000000,
            ],
            [
                'place_id' => "7",
                'user_id' => "2",
                'username' => "Morty",
                'service' => "Polishing",
                'dates' => json_encode(['2024-11-26T14:30:00Z']),
                'queueNumber' => 1,
                'price' => 800000,
            ],
            [
                'place_id' => "13",
                'user_id' => "1",
                'username' => "Rick",
                'service' => "Undercarriage",
                'dates' => json_encode(['2024-11-27T15:00:00Z']),
                'queueNumber' => 1,
                'price' => 60000,
            ],
            [
                'place_id' => "9",
                'user_id' => "2",
                'username' => "Morty",
                'service' => "Detailing",
                'dates' => json_encode(['2024-11-27T10:00:00Z']),
                'queueNumber' => 1,
                'price' => 750000,
            ],
            [
                'place_id' => "14",
                'user_id' => "1",
                'username' => "Rick",
                'service' => "Full Car Wash",
                'dates' => json_encode(['2024-11-28T09:00:00Z']),
                'queueNumber' => 1,
                'price' => 50000,
            ],
            [
                'place_id' => "15",
                'user_id' => "2",
                'username' => "Morty",
                'service' => "Polishing",
                'dates' => json_encode(['2024-11-28T12:00:00Z']),
                'queueNumber' => 1,
                'price' => 900000,
            ]
        ];

        DB::table('bookings')->insert($data);
    }
}
