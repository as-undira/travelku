<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageSchedule;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Bali Holiday',
                'destination' => 'Bali',
                'duration_days' => 4,
                'price' => 3500000,
                'distance_km' => 1200,
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=1200',

                'description' =>
                    'Nikmati pengalaman liburan selama 4 hari 3 malam di Pulau Bali dengan mengunjungi berbagai destinasi wisata populer seperti Pantai Kuta, Tanah Lot, Garuda Wisnu Kencana, dan Ubud. Paket ini dirancang untuk memberikan pengalaman wisata budaya, alam, serta kuliner khas Bali dengan fasilitas yang nyaman.',

                'facilities' =>
                    "• Hotel bintang 4 selama 3 malam\n" .
                    "• Transportasi selama perjalanan\n" .
                    "• Tour guide profesional\n" .
                    "• Tiket masuk destinasi wisata\n" .
                    "• Sarapan setiap hari\n" .
                    "• Dokumentasi perjalanan\n" .
                    "• Air mineral dan snack",

                'itinerary' =>
                    "Hari 1 : Kedatangan di Bali, check-in hotel dan menikmati sunset di Pantai Kuta.\n\n" .
                    "Hari 2 : Mengunjungi Tanah Lot, Garuda Wisnu Kencana, dan Pantai Melasti.\n\n" .
                    "Hari 3 : Wisata budaya ke Ubud, Monkey Forest, serta pusat oleh-oleh khas Bali.\n\n" .
                    "Hari 4 : Check-out hotel dan transfer menuju bandara.",
            ],

            [
                'name' => 'Labuan Bajo Adventure',
                'destination' => 'Labuan Bajo',
                'duration_days' => 5,
                'price' => 5500000,
                'distance_km' => 1800,
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1577717903315-1691ae25ab3f?w=1200',

                'description' =>
                    'Jelajahi keindahan Labuan Bajo dan Taman Nasional Komodo selama 5 hari 4 malam. Paket ini menawarkan pengalaman wisata bahari, trekking, serta menikmati panorama pulau-pulau eksotis yang terkenal di Indonesia.',

                'facilities' =>
                    "• Hotel bintang 4 selama 4 malam\n" .
                    "• Kapal wisata island hopping\n" .
                    "• Tour guide profesional\n" .
                    "• Tiket masuk Taman Nasional Komodo\n" .
                    "• Makan pagi dan siang\n" .
                    "• Dokumentasi perjalanan",

                'itinerary' =>
                    "Hari 1 : Kedatangan dan city tour Labuan Bajo.\n\n" .
                    "Hari 2 : Pulau Padar dan Pink Beach.\n\n" .
                    "Hari 3 : Pulau Komodo dan snorkeling di Manta Point.\n\n" .
                    "Hari 4 : Goa Rangko dan menikmati sunset.\n\n" .
                    "Hari 5 : Check-out dan transfer bandara.",
            ],

            [
                'name' => 'Raja Ampat Explore',
                'destination' => 'Papua',
                'duration_days' => 7,
                'price' => 8500000,
                'distance_km' => 3800,
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200',

                'description' =>
                    'Nikmati petualangan eksklusif selama 7 hari di Raja Ampat, surga bawah laut Indonesia. Paket ini menghadirkan pengalaman snorkeling, diving, island hopping, dan menikmati panorama alam terbaik di dunia.',

                'facilities' =>
                    "• Resort selama 6 malam\n" .
                    "• Kapal wisata antar pulau\n" .
                    "• Peralatan snorkeling\n" .
                    "• Tour guide profesional\n" .
                    "• Makan 3 kali sehari\n" .
                    "• Dokumentasi perjalanan",

                'itinerary' =>
                    "Hari 1 : Tiba di Sorong dan menuju Raja Ampat.\n\n" .
                    "Hari 2 : Pianemo dan Telaga Bintang.\n\n" .
                    "Hari 3 : Snorkeling di Arborek dan Yenbuba.\n\n" .
                    "Hari 4 : Island hopping dan diving.\n\n" .
                    "Hari 5 : Eksplorasi desa wisata.\n\n" .
                    "Hari 6 : Free activity dan menikmati resort.\n\n" .
                    "Hari 7 : Kembali ke Sorong dan pulang.",
            ],
        ];

        foreach ($packages as $item) {

            $package = Package::create([
                'name' => $item['name'],
                'destination' => $item['destination'],
                'duration_days' => $item['duration_days'],
                'price' => $item['price'],
                'distance_km' => $item['distance_km'],
                'thumbnail' => $item['thumbnail'],
                'description' => $item['description'],
                'facilities' => $item['facilities'],
                'itinerary' => $item['itinerary'],
                'status' => 'available',
            ]);

            PackageSchedule::create([
                'package_id' => $package->id,
                'departure_date' => now()->addDays(14),
                'quota' => 20,
                'remaining_quota' => 20,
            ]);

            PackageSchedule::create([
                'package_id' => $package->id,
                'departure_date' => now()->addDays(30),
                'quota' => 20,
                'remaining_quota' => 20,
            ]);
        }
    }
}