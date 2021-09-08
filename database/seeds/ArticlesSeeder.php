<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        DB::table('articles')->insert([
            [
                'interest_id' => 1,
                'headline' => 'IPhone 5G Termurah Meluncur Awal 2022',
                'news_url' => 'https://today.line.me/id/article/rDllX8',
                'image_url' => 'https://obs.line-scdn.net/0hPoNuKm-sD0BzDBnQs19wF0taAzFAahVJUWJEdQEOUnMNIE9BSD5cI15fVWxXNU5FUzlEIFYJVHAKP0wQHA/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 1,
                'headline' => 'Setelah Nonaktif Selama Sebulan karena Rusak, Teleskop Hubble Kembali Beroperasi',
                'news_url' => 'https://today.line.me/id/article/QaprZ0',
                'image_url' => 'https://obs.line-scdn.net/0htjS4IZSEK0VuTT3VCbxUElYbJzRdKzFMTHttdxkdInYUYWhDVHl4Jk4aIWkQfDgVTitld0xKIidKempEWg/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 2,
                'headline' => 'PPKM Mikro Diperketat, Pengusaha Hotel Minta Kompensasi Agar Tak Bangkrut',
                'news_url' => 'https://today.line.me/id/v2/article/G8wGaY',
                'image_url' => 'https://obs.line-scdn.net/0hXvzOb64OB1lHNhHv3-V4Dn1gBDZ0WhRaIwBWRxdYWW5rU0AHf1lNamYxW2FpBkAHKQJIP2QwHGg-BxVcKVZN/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 2,
                'headline' => 'Diam-diam Pendiri TikTok Berhati Mulia, Donasi Rp1,1 Triliun untuk Dana Pendidikan China!',
                'news_url' => 'https://today.line.me/id/v2/article/9j3eqg',
                'image_url' => 'https://obs.line-scdn.net/0hWE1Ds9ofCGoMPR7flZ93PTZrCwU_URtpaAtZdFxTVl0gWEw0NQxDWS08BVMiWk80ZVpBCig_E1t1DBtvYw9D/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 5,
                'headline' => 'Pasangan Hero Mobile Legends (MLBB) Ini Dapat Jatah Revamp!',
                'news_url' => 'https://today.line.me/id/v2/article/3JPBEW',
                'image_url' => 'https://obs.line-scdn.net/0hZk3puyxdBUQOCRP2bGB6EzRfBis9ZRZHaj9UWl5nW3MibEYVZW0edy8IWicnMEIaYDpMJCwIHnV3OUIaNWwe/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 5,
                'headline' => 'PUBG Mobile Rilis Set Jungle Ranger, Kostum Keren Ala Winter Soldier!',
                'news_url' => 'https://today.line.me/id/v2/article/ZDGDxj',
                'image_url' => 'https://obs.line-scdn.net/0hf5WyBtN5ORpqAC-KraxGTVJWNWtZZiMTSDFxfBhVbyNDLHscUWFqeUgFZDZONyobSmVydUwGZyISYn1PAQ/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 4,
                'headline' => 'Konser Dekade Afgan Akan Ditayangkan Ulang 9 Agustus Mendatang',
                'news_url' => 'https://today.line.me/id/v2/article/Konser+Dekade+Afgan+Akan+Ditayangkan+Ulang+9+Agustus+Mendatang-k585zq',
                'image_url' => 'https://obs.line-scdn.net/0he9w109ayOhZKSBN1yypFQXMeOXl5JCkVLn5rCBomZCIweXhJJCxxI2ZPYyYzfn1IIy9wdG8NZXRieS5CdSo/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 4,
                'headline' => '5 OST KDrama yang Dinyanyikan Joy Red Velvel, Bikin Hati Adem!',
                'news_url' => 'https://today.line.me/id/v2/article/5+OST+KDrama+yang+Dinyanyikan+Joy+Red+Velvel+Bikin+Hati+Adem-PDLML5',
                'image_url' => 'https://obs.line-scdn.net/0h7T5lWBuraHsIFUE9BqYXLDJDaxQ7eXt4bCM5ZVh7Nk9yJi8sNiciTiQVMBktIi8lYXMvHCsXc0p3IXouZCYi/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 6,
                'headline' => 'Flora Wisata San Terra, tempat wisata selfie yang penuh bunga warna-warni',
                'news_url' => 'https://today.line.me/id/v2/article/Flora+Wisata+San+Terra+tempat+wisata+selfie+yang+penuh+bunga+warna+warni-mZRl02',
                'image_url' => 'https://obs.line-scdn.net/0hD_WBrxe1G3BqOzIhZkZkJ1BtGB9ZVwhzDg1KbjpVRUQQCVsnVl4ERUZsQkBGC1wuA11TFEc-AEEVDV8lX10E/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'interest_id' => 3,
                'headline' => 'Wow Bikin Pangling! Wanita Ini Berhasil Turunkan Berat Badan Hampir 90 Kg!',
                'news_url' => 'https://today.line.me/id/v2/article/Wow+Bikin+Pangling+Wanita+Ini+Berhasil+Turunkan+Berat+Badan+Hampir+90+Kg-V8KaV1',
                'image_url' => 'https://obs.line-scdn.net/0hbN5Q9V3JPWEIKBQz8t9CNjJ-Pg47RC5ibB5sf1hGY1VyGn5gMh5zDysrMFN2G3o_Zht3ACwgJlB3Hnk3YEZz/w1200',
                'type' => 'news',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
