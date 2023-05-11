<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Standard Room',
            'Superior Room',
            'Deluxe Room',
            'Junior Suite Room',
            'Suite Room',
            'Presidential Suite',
            'Single Room',
            'Twin Room',
            'Double Room',
            'Family Room/Triple Room',
            'Connecting Room',
            'Murphy Room',
            'Accessible Room/Disabled Room',
            'Smoking/Non Smoking Room',
            'Cabana Room',
        ];

        $information = [
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
            'Lorem et occaecat et proident fugiat et ullamco pariatur aliquip elit sunt quis reprehenderit. Aliqua esse proident velit labore in commodo aliquip sit nulla magna ipsum mollit dolore. Do reprehenderit fugiat fugiat sit occaecat eu ex exercitation aliquip. Laboris anim nulla et ut eiusmod elit. Incididunt laboris do magna duis Lorem anim. Consectetur exercitation duis velit sunt esse sint nisi incididunt enim fugiat irure nostrud. Quis qui eu aute dolor in commodo.',
        ];

        for ($i = 0; $i < count($name); $i++) {
            Type::create([
                'name' => $name[$i],
                'information' => $information[$i]
            ]);
        }
    }
}
