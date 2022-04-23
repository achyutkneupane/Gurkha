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
            'image' => 'public/site_images/image_about_us_1650708872.png',
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
            'image' => 'public/site_images/image_british_army_1650709120.png',
            'value' => 'The British Army is a British military organisation that was established in the early 20th century. It is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'singapore_army',
            'title' => 'Singapore Army',
            'type' => 'text',
            'image' => 'public/site_images/image_singapore_army_1650709128.jpeg',
            'value' => 'The Singapore Army is a military organisation of the Republic of Singapore. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'indian_army',
            'title' => 'Indian Army',
            'type' => 'text',
            'image' => 'public/site_images/image_indian_army_1650709139.png',
            'value' => 'The Indian Army is a military organisation of the Republic of India. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        Detail::create([
            'key' => 'Nepal Army',
            'title' => 'Nepal Army',
            'type' => 'text',
            'image' => 'public/site_images/image_Nepal Army_1650709146.jpeg',
            'value' => 'The Nepal Army is a military organisation of the Federal Democratic Republic of Nepal. It was established in the early 20th century and is the largest military organisation in the world. The British Army is the largest military organisation in the world, with a total of over 1.5 million soldiers and over 1.5 million vehicles.',
        ]);
        // Carousel
        Detail::create([
            'key' => 'carousel1',
            'title' => 'British Army',
            'type' => 'string',
            'image' => 'public/site_images/image_carousel1_1650708670.jpeg',
            'value' => 'British Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel2',
            'title' => 'Singapore Army',
            'type' => 'string',
            'image' => 'public/site_images/image_carousel2_1650708677.png',
            'value' => 'Singapore Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel3',
            'title' => 'Indian Army',
            'type' => 'string',
            'image' => 'public/site_images/image_carousel3_1650708683.jpg',
            'value' => 'Indian Army Caption'
        ]);
        Detail::create([
            'key' => 'carousel4',
            'title' => 'Nepal Army',
            'type' => 'string',
            'image' => 'public/site_images/image_carousel4_1650708691.jpg',
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

        // map link
        Detail::create([
            'key' => 'map_link',
            'title' => 'Map Link',
            'type' => 'text',
            'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d403.12553143273993!2d87.2654398540936!3d26.81519830533987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef41fd93131821%3A0xcc81ab5225813dd7!2sGurkha%20Company%20Training%20Centre!5e0!3m2!1sen!2snp!4v1650708395436!5m2!1sen!2snp'
        ]);
    }
}
