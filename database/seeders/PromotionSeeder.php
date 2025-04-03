<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('promotions')->insert([
            [
                'title' => 'Orange Green Bold Modern Music Event',
                'description' => 'A modern music event featuring a bold orange and green design. Enjoy performances from top bands and artists in an energetic atmosphere.',
                'image' => 'images/Orange Green Bold Modern Music Event Landscape Banner.png',
            ],
            [
                'title' => 'Blue and Orange Webinar Event Banner',
                'description' => 'An exclusive webinar with a blue and orange theme, discussing the latest industry trends and featuring expert speakers.',
                'image' => 'images/Blue and Orange Webinar Event Banner.png',
            ],
            [
                'title' => 'White Blue Modern Tech Finance Event',
                'description' => 'A modern technology and finance event with a white and blue design, showcasing the latest innovations in the financial world.',
                'image' => 'images/White Blue Modern Tech Finance Event Banner.png',
            ],
            [
                'title' => 'Red and Orange Bold Philippine Festival',
                'description' => 'A vibrant Philippine cultural festival with red and orange tones, featuring traditional dances, music, and cuisine.',
                'image' => 'images/Red and Orange Bold Philippine Festival Event Banner .png',
            ],
            [
                'title' => 'Yellow Black Bold Simple Marathon Event',
                'description' => 'A simple marathon event with a bold yellow and black theme, perfect for runners looking to challenge their limits.',
                'image' => 'images/Yellow Black Bold Simple Marathon Event Landscape Banner.png',
            ],
        ]);
    }
}
