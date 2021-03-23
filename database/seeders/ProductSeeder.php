<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        ['name' =>'Oppo Mobile',
            'price' =>'200',
            'category' =>'Mobile',
            'description' =>'Smart Phone With 4gb Ram and much more feature',
            'gallery' =>'https://images.samsung.com/is/image/samsung/p6pim/in/sm-e625fzbgins/gallery/in-galaxy-f62-8gb-ram-sm-e625fzbgins-392276594?$684_547_PNG$',
        ],
        ['name' =>'Samsung Mobile',
            'price' =>'200',
            'category' =>'Mobile',
            'description' =>'Smart Phone With 4gb Ram and much more feature',
            'gallery' =>'https://images.samsung.com/is/image/samsung/in-galaxy-f41-f415fz-6gb-sm-f415fzbgins-sm-f---fzbdins-314816801?$720_576_PNG$',
        ],
        ['name' =>'Lenovo Mobile',
            'price' =>'200',
            'category' =>'Mobile',
            'description' =>'Smart Phone With 4gb Ram and much more feature',
            'gallery' =>'https://images.samsung.com/is/image/samsung/in-galaxy-f41-f415fz-6gb-sm-f415fzbgins-sm-f---fzbdins-314816801?$720_576_PNG$',
        ],
        ['name' =>'LG Mobile',
            'price' =>'200',
            'category' =>'Mobile',
            'description' =>'Smart Phone With 4gb Ram and much more feature',
            'gallery' =>'https://images.samsung.com/is/image/samsung/in-galaxy-f41-f415fz-6gb-sm-f415fzbgins-sm-f---fzbdins-314816801?$720_576_PNG$',
        ],
        ]);
    }
}
