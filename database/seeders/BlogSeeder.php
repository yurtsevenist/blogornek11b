<?php

namespace Database\Seeders;

use App\Models\Blog;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Seed the blogs table with sample blog posts.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create('tr_TR');
        $coverImages = [
            'https://images.unsplash.com/photo-1499757805027-2f0e8c9d3f8f',
            'https://images.unsplash.com/photo-1455390582262-044cdead1c',
            'https://images.unsplash.com/photo-1456324504439-367cee3b3c32',
            'https://images.unsplash.com/photo-1497366754035-f200968a6e72',
            'https://images.unsplash.com/photo-1497215842964-222b430dc094',
            'https://images.unsplash.com/photo-1497366811353-6870744d04b2',
            'https://images.unsplash.com/photo-1497366216548-37526070297c',
            'https://images.unsplash.com/photo-1516321318423-f06f85e504b3',
            'https://images.unsplash.com/photo-1516321497487-e288fb19713f',
            'https://images.unsplash.com/photo-1517842645767-c639042777db',
            'https://images.unsplash.com/photo-1516979187457-637abb4f9353',
            'https://images.unsplash.com/photo-1519682337058-a94d519337bc',
            'https://images.unsplash.com/photo-1521737711867-e3b97375f902',
            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f',
            'https://images.unsplash.com/photo-1523240795612-9a054b0db644',
            'https://images.unsplash.com/photo-1523726491678-bf852e717f6b',
            'https://images.unsplash.com/photo-1531482615713-2afd69097998',
            'https://images.unsplash.com/photo-1533750349088-cd871a92f312',
            'https://images.unsplash.com/photo-1542435503-956c469947f6',
            'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c',
            'https://images.unsplash.com/photo-1544947950-fa07a98d237f',
            'https://images.unsplash.com/photo-1553877522-43269d4ea984',
            'https://images.unsplash.com/photo-1556761175-b413da4baf72',
            'https://images.unsplash.com/photo-1557804506-669a67965ba0',
            'https://images.unsplash.com/photo-1559028006-448665bd7c7f',
            'https://images.unsplash.com/photo-1560785496-3c9d27877182',
            'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e',
            'https://images.unsplash.com/photo-1587614382346-4ec70e388b28',
            'https://images.unsplash.com/photo-1600880292203-757bb62b4baf',
            'https://images.unsplash.com/photo-1606320986603-8e9c5f8f2f6b',
        ];

        for ($i = 0; $i < 30; $i++) {
            $title = $faker->unique()->sentence(6);

            Blog::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'excerpt' => $faker->text(180),
                'content' => implode("\n\n", $faker->paragraphs(6)),
                'cover_image' => $coverImages[$i],
                'is_published' => true,
                'published_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
