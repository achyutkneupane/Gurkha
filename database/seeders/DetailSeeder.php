<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contact Information
        Detail::create([
            'key' => 'about_us',
            'title' => 'About Us',
            'type' => 'text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Donec euismod, nisl eget consectetur consectetur, nisi nisl tincidunt nisi, euismod consectetur nisi nisl eget nisi. Done'
        ]);
        Detail::create([
            'key' => 'contact_number',
            'title' => 'Contact Number',
            'type' => 'string',
            'value' => '9817341100'
        ]);
        Detail::create([
            'key' => 'contact_email',
            'title' => 'Contact Email',
            'type' => 'string',
            'value' => 'gctc2020@gmail.com'
        ]);

        // Army section
        Detail::create([
            'key' => 'british_army',
            'title' => 'British Army',
            'type' => 'text',
            'value' => 'The British Army is a British military organisation that was established in the early 20th century. It is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'singapore_army',
            'title' => 'Singapore Army',
            'type' => 'text',
            'value' => 'The Singapore Army is a military organisation of the Republic of Singapore. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'indian_army',
            'title' => 'Indian Army',
            'type' => 'text',
            'value' => 'The Indian Army is a military organisation of the Republic of India. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'Nepal Army',
            'title' => 'Nepal Army',
            'type' => 'text',
            'value' => 'The Nepal Army is a military organisation of the Federal Democratic Republic of Nepal. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        // Carousel
        Detail::create([
            'key' => 'carousel1',
            'title' => 'British Army',
            'type' => 'string',
            'value' => 'British Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel2',
            'title' => 'Singapore Army',
            'type' => 'string',
            'value' => 'Singapore Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel3',
            'title' => 'Indian Army',
            'type' => 'string',
            'value' => 'Indian Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel4',
            'title' => 'Nepal Army',
            'type' => 'string',
            'value' => 'Nepal Army Caption'
        ]);

        // Social Media
        Detail::create([
            'key' => 'social_facebook',
            'title' => 'Facebook',
            'type' => 'string',
            'value' => 'https://www.facebook.com/lahureforever'
        ]);
        Detail::create([
            'key' => 'social_instagram',
            'title' => 'Instagram',
            'type' => 'string',
            'value' => 'https://www.instagram.com/premmukarungrai/'
        ]);
        Detail::create([
            'key' => 'social_tiktok',
            'title' => 'Tiktok',
            'type' => 'string',
            'value' => 'https://vm.tiktok.com/ZSdhfPNyo/'
        ]);
    }
}
