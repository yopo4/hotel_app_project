<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Available',
            'Occupied',
            // 'Occupied Clean',
            // 'Occupied Dirty',
            // 'Vacant Clean Inspected',
            // 'Vacant Clean',
            // 'Vacant Dirty',
            // 'Compliment',
            // 'House Use',
            // 'Do not Disturb',
            // 'Sleep Out',
            // 'Skipper',
            // 'Out of Service',
            // 'Out of Order',
            // 'Due Out / Expected Departure',
            // 'Expected Arrival',
            // 'Check Out',
            // 'Late Check Out',
            // 'Occupeid no Luggage',
            // 'Double Lock',
        ];

        $codes = [
            'A',
            'O',
            // 'OC',
            // 'OD',
            // 'VCI',
            // 'VC',
            // 'VD',
            // 'Comp',
            // 'HU',
            // 'DND',
            // 'SO',
            // 'Skip',
            // 'OS',
            // 'OOO',
            // 'DO/ED',
            // 'EA',
            // 'CO',
            // 'LCO',
            // 'ONL',
            // 'DL',
        ];

        $informations = [
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            // 'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
        ];

        for ($i = 0; $i < count($codes); $i++) {
            RoomStatus::create([
                'name' => $names[$i],
                'code' => $codes[$i],
                'information' => $informations[$i]
            ]);
        }
    }
}
