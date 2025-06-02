<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Classic Haircut',
                'description' => 'Traditional haircut with clippers and scissors',
                'price' => 25.00,
                'duration' => 30,
                'featured' => ['Consultation', 'Shampoo', 'Styling']
            ],
            [
                'name' => 'Beard Trim',
                'description' => 'Shape and trim your beard to perfection',
                'price' => 15.00,
                'duration' => 20,
                'featured' => ['Beard Wash', 'Hot Towel', 'Beard Oil']
            ],
            [
                'name' => 'Premium Package',
                'description' => 'Complete grooming experience',
                'price' => 45.00,
                'duration' => 60,
                'featured' => ['Haircut', 'Beard Trim', 'Hot Towel Treatment', 'Face Massage']
            ],
            [
                'name' => 'Kid\'s Haircut',
                'description' => 'Haircut for children under 12 years old',
                'price' => 20.00,
                'duration' => 25,
                'featured' => ['Child-friendly Environment', 'Gentle Approach', 'Fun Experience']
            ],
            [
                'name' => 'Hot Towel Shave',
                'description' => 'Traditional straight razor shave',
                'price' => 30.00,
                'duration' => 30,
                'featured' => ['Hot Towel Preparation', 'Premium Shaving Cream', 'After-Shave Treatment']
            ],
            [
                'name' => 'Hair Coloring',
                'description' => 'Professional hair coloring service',
                'price' => 60.00,
                'duration' => 90,
                'featured' => ['Consultation', 'Premium Color Products', 'Styling']
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
