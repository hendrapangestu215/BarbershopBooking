<?php

namespace Database\Seeders;

use App\Models\Hairstyle;
use Illuminate\Database\Seeder;

class HairstyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hairstyles = [
            [
                'name' => 'Modern Fade',
                'description' => 'A contemporary take on the classic fade haircut with a seamless transition from skin to longer hair on top. Perfect for a clean, sharp look.',
                'rating' => 4.9,
                'image' => 'hairstyles/ModernFade.png'
            ],
            [
                'name' => 'Classic Pompadour',
                'description' => 'A timeless style featuring voluminous hair swept upward and back from the face. Ideal for those wanting a sophisticated, retro-inspired look.',
                'rating' => 4.7,
                'image' => 'hairstyles/ClassicPompadour.jpg'
            ],
            [
                'name' => 'Textured Crop',
                'description' => 'A low-maintenance style with textured top and short sides. Great for adding dimension and movement to your hair.',
                'rating' => 4.8,
                'image' => 'hairstyles/TexturedFrenchCrop.jpg'
            ],
            [
                'name' => 'Slick Back',
                'description' => 'A polished style where hair is combed backward from the forehead. Perfect for formal occasions or a professional appearance.',
                'rating' => 4.6,
                'image' => 'hairstyles/SlickBack.png'
            ],
            [
                'name' => 'Man Bun',
                'description' => 'A modern style where longer hair is gathered and secured in a bun at the crown or back of the head. Versatile and trendy.',
                'rating' => 4.5,
                'image' => 'hairstyles/ManBun.jpeg'
            ],
            [
                'name' => 'Buzz Cut',
                'description' => 'An ultra-short haircut achieved with electric clippers. Low-maintenance and practical for active lifestyles.',
                'rating' => 4.4,
                'image' => 'hairstyles/BuzzCut.png'
            ],
            [
                'name' => 'Side Part',
                'description' => 'A classic haircut featuring a part on one side with hair combed away from the part. Timeless and suitable for professional settings.',
                'rating' => 4.7,
                'image' => 'hairstyles/SidePart.jpg'
            ],
            [
                'name' => 'Long Layers',
                'description' => 'A style for longer hair with layers cut at different lengths to add volume and texture. Provides movement and dimension.',
                'rating' => 4.6,
                'image' => 'hairstyles/LongLayers.png'
            ],
            [
                'name' => 'Crew Cut',
                'description' => 'A short hairstyle where the upright hair on the top of the head is cut shorter than the sides. Military-inspired and neat.',
                'rating' => 4.5,
                'image' => 'hairstyles/CrewCut.jpg'
            ],
            [
                'name' => 'Quiff',
                'description' => 'A hairstyle that combines elements of the pompadour, flattop, and mohawk. Features volume at the front with shorter sides.',
                'rating' => 4.8,
                'image' => 'hairstyles/Quiff.jpg'
            ],
            [
                'name' => 'Dreadlocks',
                'description' => 'A style where hair is rope-like strands formed by matting or braiding hair. Cultural significance with a distinctive appearance.',
                'rating' => 4.7,
                'image' => 'hairstyles/Dreadlocks.png'
            ],
            [
                'name' => 'French Crop',
                'description' => 'A short haircut with a tapered back and sides, and a straight fringe at the front. Modern, stylish, and easy to maintain.',
                'rating' => 4.6,
                'image' => 'hairstyles/FrenchCrop.jpg'
            ],
        ];

        foreach ($hairstyles as $hairstyle) {
            Hairstyle::create($hairstyle);
        }
    }
}
