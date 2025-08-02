<?php

namespace Database\Seeders;

use App\Models\Cake;
use Illuminate\Database\Seeder;

class CakeSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $cakes = [
            [
                'name' => 'Chocolate Fudge Cake',
                'description' => 'Kue coklat lembut dengan lapisan fudge yang kaya dan creamy. Dibuat dengan coklat premium Belgium yang memberikan rasa coklat yang mendalam dan tekstur yang moist. Cocok untuk perayaan ulang tahun atau acara special.',
                'price' => 350000,
                'category' => 'chocolate',
                'is_available' => true,
            ],
            [
                'name' => 'Red Velvet Cake',
                'description' => 'Kue red velvet klasik dengan warna merah yang cantik dan cream cheese frosting yang lezat. Tekstur yang halus dan rasa yang mild dengan sedikit hint kakao. Perfect untuk special occasions.',
                'price' => 375000,
                'category' => 'velvet',
                'is_available' => true,
            ],
            [
                'name' => 'Vanilla Birthday Cake',
                'description' => 'Kue vanilla klasik yang lembut dengan buttercream frosting vanilla yang creamy. Dapat dikustom dengan hiasan dan tulisan sesuai keinginan. Ideal untuk perayaan ulang tahun semua usia.',
                'price' => 300000,
                'category' => 'vanilla',
                'is_available' => true,
            ],
            [
                'name' => 'Strawberry Shortcake',
                'description' => 'Kue sponge vanilla yang lembut dengan whipped cream fresh dan potongan strawberry segar. Light, refreshing, dan perfect untuk musim panas atau acara yang membutuhkan dessert yang tidak terlalu heavy.',
                'price' => 325000,
                'category' => 'fruit',
                'is_available' => true,
            ],
            [
                'name' => 'Lemon Drizzle Cake',
                'description' => 'Kue lemon yang moist dengan glaze lemon yang manis dan asam. Dibuat dengan lemon fresh yang memberikan aroma citrus yang menyegarkan. Perfect untuk afternoon tea atau dessert setelah makan berat.',
                'price' => 290000,
                'category' => 'citrus',
                'is_available' => true,
            ],
            [
                'name' => 'Tiramisu Cake',
                'description' => 'Interpretasi modern dari tiramisu klasik Italia dalam bentuk layer cake. Dengan sponge yang direndam coffee, mascarpone cream, dan dusting cocoa powder. Rasa yang sophisticated untuk pecinta coffee.',
                'price' => 425000,
                'category' => 'coffee',
                'is_available' => false,
            ],
            [
                'name' => 'Carrot Cake',
                'description' => 'Kue wortel yang moist dengan cream cheese frosting dan taburan walnut. Mengandung rempah-rempah seperti cinnamon yang memberikan aroma hangat. Healthy choice yang tetap indulgent.',
                'price' => 340000,
                'category' => 'spice',
                'is_available' => true,
            ],
            [
                'name' => 'Black Forest Cake',
                'description' => 'Kue coklat dengan cherry dan whipped cream, terinspirasi dari dessert tradisional Jerman. Layer chocolate sponge dengan cherry filling dan cherry brandy untuk rasa yang authentic.',
                'price' => 400000,
                'category' => 'chocolate',
                'is_available' => true,
            ],
        ];

        foreach ($cakes as $cake) {
            Cake::create($cake);
        }
    }
}
