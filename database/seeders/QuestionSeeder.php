<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question_text' => "What is the capital city of West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/d/dd/Bandung_City_01.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Bandung', 'is_correct' => true],
                    ['answer_text' => 'Jakarta', 'is_correct' => false],
                    ['answer_text' => 'Surabaya', 'is_correct' => false],
                    ['answer_text' => 'Semarang', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the largest city in West Java by population?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Patriot_Stadium_Bekasi_%28cropped%29.jpg/800px-Patriot_Stadium_Bekasi_%28cropped%29.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Bekasi', 'is_correct' => true],
                    ['answer_text' => 'Bandung', 'is_correct' => false],
                    ['answer_text' => 'Bogor', 'is_correct' => false],
                    ['answer_text' => 'Depok', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which famous volcano is located in West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Tangkuban_Perahu_Mountain.jpg/800px-Tangkuban_Perahu_Mountain.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Mount Merapi', 'is_correct' => false],
                    ['answer_text' => 'Mount Bromo', 'is_correct' => false],
                    ['answer_text' => 'Mount Salak', 'is_correct' => false],
                    ['answer_text' => 'Mount Tangkuban Perahu', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which ethnic group is the largest in West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Sundanese_Grandma.jpg/411px-Sundanese_Grandma.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Javanese', 'is_correct' => false],
                    ['answer_text' => 'Sundanese', 'is_correct' => true],
                    ['answer_text' => 'Batak', 'is_correct' => false],
                    ['answer_text' => 'Minangkabau', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the traditional musical instrument from West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Angklung_%282315119130%29.jpg/800px-Angklung_%282315119130%29.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Angklung', 'is_correct' => true],
                    ['answer_text' => 'Gamelan', 'is_correct' => false],
                    ['answer_text' => 'Sape', 'is_correct' => false],
                    ['answer_text' => 'Sasando', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the famous traditional dance from West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Jaipongan_Langit_Biru_03.jpg/1280px-Jaipongan_Langit_Biru_03.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tari Piring', 'is_correct' => false],
                    ['answer_text' => 'Tari Kecak', 'is_correct' => false],
                    ['answer_text' => 'Tari Jaipong', 'is_correct' => true],
                    ['answer_text' => 'Tari Saman', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which river is the longest in West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/8/8a/Cisanti_Lake.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Citarum River', 'is_correct' => true],
                    ['answer_text' => 'Brantas River', 'is_correct' => false],
                    ['answer_text' => 'Bengawan Solo River', 'is_correct' => false],
                    ['answer_text' => 'Musi River', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the main language spoken in West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 6,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Word_Sunda_in_Sundanese_Script_SVG_Version.svg/1280px-Word_Sunda_in_Sundanese_Script_SVG_Version.svg.png",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Javanese', 'is_correct' => false],
                    ['answer_text' => 'Sundanese', 'is_correct' => true],
                    ['answer_text' => 'Balinese', 'is_correct' => false],
                    ['answer_text' => 'Minangkabau', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which popular tourist destination is known for its tea plantations in West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Puncak_Pass_-_Indonesia_-_Wide.jpg/1280px-Puncak_Pass_-_Indonesia_-_Wide.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Puncak', 'is_correct' => true],
                    ['answer_text' => 'Dieng Plateau', 'is_correct' => false],
                    ['answer_text' => 'Bali', 'is_correct' => false],
                    ['answer_text' => 'Lombok', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which historical kingdom was centered in West Java?",
                'difficulty_level' => 'hard',
                'category_id' => 2,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Sunda_Kingdom.svg/1280px-Sunda_Kingdom.svg.png",
                'points' => 5,
                'answers' => [
                    ['answer_text' => 'Majapahit', 'is_correct' => false],
                    ['answer_text' => 'Srivijaya', 'is_correct' => false],
                    ['answer_text' => 'Sunda Kingdom', 'is_correct' => true],
                    ['answer_text' => 'Mataram', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the traditional Sundanese house called?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/6/60/COLLECTIE_TROPENMUSEUM_Kampong_Wanaradja_bij_de_vulkaan_Papandajan_op_West-Java._TMnr_60007645.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Joglo', 'is_correct' => false],
                    ['answer_text' => 'Rumah Gadang', 'is_correct' => false],
                    ['answer_text' => 'Julang Ngapak', 'is_correct' => true],
                    ['answer_text' => 'Karo', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which lake is located in West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Patenggang_Lake_01.jpg/800px-Patenggang_Lake_01.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Lake Toba', 'is_correct' => false],
                    ['answer_text' => 'Lake Singkarak', 'is_correct' => false],
                    ['answer_text' => 'Lake Maninjau', 'is_correct' => false],
                    ['answer_text' => 'Lake Patenggang', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which city in West Java is known as the \"City of Flowers\"?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Bandung_City_11.jpg/1280px-Bandung_City_11.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Bandung', 'is_correct' => true],
                    ['answer_text' => 'Bogor', 'is_correct' => false],
                    ['answer_text' => 'Cirebon', 'is_correct' => false],
                    ['answer_text' => 'Garut', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the famous culinary dish from West Java that consists of skewered and grilled meat?",
                'difficulty_level' => 'medium',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Sate_Maranggi_1.jpg/671px-Sate_Maranggi_1.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Nasi Goreng', 'is_correct' => false],
                    ['answer_text' => 'Sate Maranggi', 'is_correct' => true],
                    ['answer_text' => 'Rendang', 'is_correct' => false],
                    ['answer_text' => 'Gudeg', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional market in West Java is famous for selling various antiques and vintage items?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://asset.kompas.com/crops/fzXcGbb2ZdzJb4se3DZMehrOddA=/0x0:0x0/750x500/data/photo/2023/03/28/6422a22792215.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Pasar Baru', 'is_correct' => false],
                    ['answer_text' => 'Pasar Cihapit', 'is_correct' => false],
                    ['answer_text' => 'Pasar Kaget', 'is_correct' => false],
                    ['answer_text' => 'Pasar Gedebage', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "What is the highest mountain in West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/e/eb/Gunung_Ciremai_sfw2503.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Mount Gede', 'is_correct' => false],
                    ['answer_text' => 'Mount Cereme', 'is_correct' => true],
                    ['answer_text' => 'Mount Pangrango', 'is_correct' => false],
                    ['answer_text' => 'Mount Salak', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which West Java city is famous for its kite festival?",
                'difficulty_level' => 'medium',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://asset-2.tstatic.net/tribunnews/foto/bank/images/international-kite-festival-2016_20160618_093426.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Tasikmalaya', 'is_correct' => false],
                    ['answer_text' => 'Pangandaran', 'is_correct' => true],
                    ['answer_text' => 'Sukabumi', 'is_correct' => false],
                    ['answer_text' => 'Indramayu', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the traditional food from Bandung made from fermented soybean?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Oncom_merah.JPG/800px-Oncom_merah.JPG",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tempeh', 'is_correct' => false],
                    ['answer_text' => 'Tahu', 'is_correct' => false],
                    ['answer_text' => 'Oncom', 'is_correct' => true],
                    ['answer_text' => 'Karedok', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which waterfall in West Java is known as \"The Queen of Waterfalls\"?",
                'difficulty_level' => 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Curug_Malela.jpg/800px-Curug_Malela.jpg",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Curug Cimahi', 'is_correct' => false],
                    ['answer_text' => 'Curug Malela', 'is_correct' => true],
                    ['answer_text' => 'Curug Cikaso', 'is_correct' => false],
                    ['answer_text' => 'Curug Sewu', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional martial art originated from West Java?",
                'difficulty_level' => 'medium',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Pencak_Silat_Nusantara.jpg/761px-Pencak_Silat_Nusantara.jpg?20210430092211",
                'points' => 3,
                'answers' => [
                    ['answer_text' => 'Kuntao', 'is_correct' => false],
                    ['answer_text' => 'Tarung Derajat', 'is_correct' => false],
                    ['answer_text' => 'Pencak Silat', 'is_correct' => true],
                    ['answer_text' => 'Cimande', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional cloth is associated with West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Batik_Mega_Mendung.jpg/447px-Batik_Mega_Mendung.jpg?20190210084855",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Ulos', 'is_correct' => false],
                    ['answer_text' => 'Tenun', 'is_correct' => false],
                    ['answer_text' => 'Songket', 'is_correct' => false],
                    ['answer_text' => 'Batik', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which port city in West Java is famous for its seafood?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Pelabuhan_Cirebon.jpg/640px-Pelabuhan_Cirebon.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Cirebon', 'is_correct' => true],
                    ['answer_text' => 'Palembang', 'is_correct' => false],
                    ['answer_text' => 'Semarang', 'is_correct' => false],
                    ['answer_text' => 'Surabaya', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which natural attraction in West Java is a hot spring resort?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Ciater_03.jpg/640px-Ciater_03.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tawangmangu', 'is_correct' => false],
                    ['answer_text' => 'Ciater', 'is_correct' => true],
                    ['answer_text' => 'Kaliurang', 'is_correct' => false],
                    ['answer_text' => 'Sarangan', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the main agricultural product of West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/The_tea_plantation.jpg/640px-The_tea_plantation.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Rice', 'is_correct' => false],
                    ['answer_text' => 'Coffee', 'is_correct' => false],
                    ['answer_text' => 'Tea', 'is_correct' => true],
                    ['answer_text' => 'Cocoa', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which city in West Java is known for its leather crafts?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://wonderfulimage.s3-id-jkt-1.kilatstorage.id/1637123284-pusat_kerajinan_kulit-1-thumb.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tasikmalaya', 'is_correct' => false],
                    ['answer_text' => 'Garut', 'is_correct' => true],
                    ['answer_text' => 'Sukabumi', 'is_correct' => false],
                    ['answer_text' => 'Majalengka', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional ceremony in West Java celebrates the rice harvest?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/PERTAHANKAN_ASET_BUDAYA_LEWAT_SEREN_TAUN_KUNINGAN.jpg/640px-PERTAHANKAN_ASET_BUDAYA_LEWAT_SEREN_TAUN_KUNINGAN.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Seren Taun', 'is_correct' => true],
                    ['answer_text' => 'Ngaben', 'is_correct' => false],
                    ['answer_text' => 'Kasada', 'is_correct' => false],
                    ['answer_text' => 'Sekaten', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the traditional fishing boat used in West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Fishing_boats_in_Pangandaran%2C_West_Java%2C_Indonesia.jpg/800px-Fishing_boats_in_Pangandaran%2C_West_Java%2C_Indonesia.jpg?20090215213140",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Parahu', 'is_correct' => true],
                    ['answer_text' => 'Jukung', 'is_correct' => false],
                    ['answer_text' => 'Phinisi', 'is_correct' => false],
                    ['answer_text' => 'Sampan', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional West Java game involves a spinning top?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://indonesiakaya.com/wp-content/uploads/2020/10/Gasing_Panggal_1200.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Congklak', 'is_correct' => false],
                    ['answer_text' => 'Egrang', 'is_correct' => false],
                    ['answer_text' => 'Gatrik', 'is_correct' => false],
                    ['answer_text' => 'Gasing', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which West Java city is known for its tofu and oncom production?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Tahu_Sumedang_Saribumi_-_panoramio.jpg/640px-Tahu_Sumedang_Saribumi_-_panoramio.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Cianjur', 'is_correct' => false],
                    ['answer_text' => 'Purwakarta', 'is_correct' => false],
                    ['answer_text' => 'Sumedang', 'is_correct' => true],
                    ['answer_text' => 'Subang', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which natural park in West Java is home to various wildlife species including the Javan gibbon?",
                'difficulty_level' => 'easy',
                'category_id' => 4,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Entrance_of_Nangka_Waterfall_%28Curug_Nangka%29_in_Taman_Nasional_Gunung_Halimun_Salak%2C_West_Java.jpg/640px-Entrance_of_Nangka_Waterfall_%28Curug_Nangka%29_in_Taman_Nasional_Gunung_Halimun_Salak%2C_West_Java.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Mount Halimun Salak National Park', 'is_correct' => true],
                    ['answer_text' => 'Ujung Kulon National Park', 'is_correct' => false],
                    ['answer_text' => 'Baluran National Park', 'is_correct' => false],
                    ['answer_text' => 'Meru Betiri National Park', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the Sundanese shadow puppet theater?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Belajar_Wayang_Golek.jpg/640px-Belajar_Wayang_Golek.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Wayang Kulit', 'is_correct' => false],
                    ['answer_text' => 'Wayang Golek', 'is_correct' => true],
                    ['answer_text' => 'Wayang Orang', 'is_correct' => false],
                    ['answer_text' => 'Wayang Klitik', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional West Java snack is made from fermented cassava?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://cdn-u1-gnfi.imgix.net/post/large-shutterstock-1374431525-7bb2ba225b0ca4dec689cf6855d09846.jpg?fit=crop&crop=faces%2Centropy&lossless=true&auto=compress%2Cformat&w=730&h=486",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Peuyeum', 'is_correct' => true],
                    ['answer_text' => 'Dodol', 'is_correct' => false],
                    ['answer_text' => 'Serabi', 'is_correct' => false],
                    ['answer_text' => 'Getuk', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the traditional house of the Baduy people called?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Barisan_Pemukiman_Suku_Baduy_Luar.jpg/200px-Barisan_Pemukiman_Suku_Baduy_Luar.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Lumbung', 'is_correct' => false],
                    ['answer_text' => 'Bale', 'is_correct' => false],
                    ['answer_text' => 'Sulah Nyanda', 'is_correct' => true],
                    ['answer_text' => 'Rumah Adat', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which waterfall in West Java is known for its three levels?",
                'difficulty_level' => 'easy',
                'category_id' => 4,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Beauty_of_Curug_Cikaso_%28cikaso_waterfall%29.jpg/1280px-Beauty_of_Curug_Cikaso_%28cikaso_waterfall%29.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Curug Sewu', 'is_correct' => false],
                    ['answer_text' => 'Curug Cipendok', 'is_correct' => false],
                    ['answer_text' => 'Curug Cikaso', 'is_correct' => true],
                    ['answer_text' => 'Curug Bengkawah', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional West Java music genre is characterized by its lively rhythm and danceable beat?",
                'difficulty_level' => 'easy',
                'category_id' => 6,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Jaipong.jpg/1280px-Jaipong.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Jaipongan', 'is_correct' => true],
                    ['answer_text' => 'Keroncong', 'is_correct' => false],
                    ['answer_text' => 'Dangdut', 'is_correct' => false],
                    ['answer_text' => 'Kroncong', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which city in West Java is famous for its angklung performance center?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Saung_Angklung_Udjo.JPG/1280px-Saung_Angklung_Udjo.JPG",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Cirebon', 'is_correct' => false],
                    ['answer_text' => 'Bandung', 'is_correct' => true],
                    ['answer_text' => 'Bogor', 'is_correct' => false],
                    ['answer_text' => 'Depok', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the traditional Sundanese rice cake wrapped in banana leaves?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://asset-2.tstatic.net/manado/foto/bank/images/cara-membuat-lontong-anti-gagalhfghgfhgf.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Lemper', 'is_correct' => false],
                    ['answer_text' => 'Pepes', 'is_correct' => false],
                    ['answer_text' => 'Lontong', 'is_correct' => true],
                    ['answer_text' => 'Burayot', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which region in West Java is famous for its bamboo handicrafts?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "http://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/bisnisbandung/2018/06/kerajinan-bambu-tasik.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tasikmalaya', 'is_correct' => true],
                    ['answer_text' => 'Garut', 'is_correct' => false],
                    ['answer_text' => 'Cianjur', 'is_correct' => false],
                    ['answer_text' => 'Majalengka', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which historical site in West Java was a former Dutch colonial mansion?",
                'difficulty_level' => 'easy',
                'category_id' => 2,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Gedung-Sate-Trees.jpg/1280px-Gedung-Sate-Trees.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Lawang Sewu', 'is_correct' => false],
                    ['answer_text' => 'Istana Bogor', 'is_correct' => false],
                    ['answer_text' => 'Gedung Sate', 'is_correct' => true],
                    ['answer_text' => 'Fort Rotterdam', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the traditional Sundanese kite?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://jabarekspres.com/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-27-at-16.16.18.jpeg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Wau', 'is_correct' => false],
                    ['answer_text' => 'Janggan', 'is_correct' => false],
                    ['answer_text' => 'Talibong', 'is_correct' => false],
                    ['answer_text' => 'Langlayangan', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which West Java city is known for its botanical garden?",
                'difficulty_level' => 'easy',
                'category_id' => 4,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Bogor_Botanical_Gardens_Java20.jpg/1280px-Bogor_Botanical_Gardens_Java20.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Bogor', 'is_correct' => true],
                    ['answer_text' => 'Bandung', 'is_correct' => false],
                    ['answer_text' => 'Cirebon', 'is_correct' => false],
                    ['answer_text' => 'Sukabumi', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the traditional fermented vegetable dish from West Java?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Asinan_Bogor.JPG/800px-Asinan_Bogor.JPG",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Kimchi', 'is_correct' => false],
                    ['answer_text' => 'Asinan Bogor', 'is_correct' => true],
                    ['answer_text' => 'Sauerkraut', 'is_correct' => false],
                    ['answer_text' => 'Pickles', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which island in West Java is known for its white sandy beaches and clear waters?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Pantai_Ujung_Genteng%2C_Sukabumi%2C_Jawa_Barat%2C_25052017.jpg/800px-Pantai_Ujung_Genteng%2C_Sukabumi%2C_Jawa_Barat%2C_25052017.jpg?20170630110642",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Pulau Seribu', 'is_correct' => false],
                    ['answer_text' => 'Pulau Panaitan', 'is_correct' => false],
                    ['answer_text' => 'Pulau Pari', 'is_correct' => false],
                    ['answer_text' => 'Ujung Genteng', 'is_correct' => true],
                ]
            ],
            [
                'question_text' => "Which West Java city is famous for its tofu industry?",
                'difficulty_level' => 'easy',
                'category_id' => 5,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Tugu_Sumedang_-_Prabu_Gajah_Agung_-_panoramio.jpg/800px-Tugu_Sumedang_-_Prabu_Gajah_Agung_-_panoramio.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tasikmalaya', 'is_correct' => false],
                    ['answer_text' => 'Cirebon', 'is_correct' => false],
                    ['answer_text' => 'Sumedang', 'is_correct' => true],
                    ['answer_text' => 'Bandung', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the traditional Sundanese batik motif from East Priangan?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://i0.wp.com/kagama.id/wp-content/uploads/2021/10/000000.jpg?resize=678%2C381&ssl=1",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tenun', 'is_correct' => false],
                    ['answer_text' => 'Sasirangan', 'is_correct' => false],
                    ['answer_text' => 'Batik Merak Ngibing', 'is_correct' => true],
                    ['answer_text' => 'Kecapi Suling', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which modern creation dance from West Java that often mistakenly taught to be the dance of female peacocks?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/DSC_0624_yuri.jpg/1280px-DSC_0624_yuri.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Tari Merak', 'is_correct' => true],
                    ['answer_text' => 'Tari Topeng', 'is_correct' => false],
                    ['answer_text' => 'Tari Saman', 'is_correct' => false],
                    ['answer_text' => 'Tari Jaipong', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which city in West Java is known as the 'Paris of Java'?",
                'difficulty_level' => 'easy',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Bandung_city_centre%2C_July_2014.jpg/1280px-Bandung_city_centre%2C_July_2014.jpg",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Bogor', 'is_correct' => false],
                    ['answer_text' => 'Cirebon', 'is_correct' => false],
                    ['answer_text' => 'Bandung', 'is_correct' => true],
                    ['answer_text' => 'Sukabumi', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional Sundanese dish is made from young jackfruit?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://img-global.cpcdn.com/recipes/517b1fcec36c3c1f/680x482cq70/gudeg-nangka-sunda-ala-dek-soem-foto-resep-utama.webp",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Sayur Nangka', 'is_correct' => true],
                    ['answer_text' => 'Gudeg', 'is_correct' => false],
                    ['answer_text' => 'Gulai Nangka', 'is_correct' => false],
                    ['answer_text' => 'Karedok', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "Which traditional Sundanese festival celebrates the New Year according to the Sundanese calendar?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => "https://asset.kompas.com/crops/HFJZx5nYMsBFiPGPAGnnUq0hbLw=/0x83:1000x750/750x500/data/photo/2018/02/18/2813259133.JPG",
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Sekaten', 'is_correct' => false],
                    ['answer_text' => 'Kawalu', 'is_correct' => true],
                    ['answer_text' => 'Nyepi', 'is_correct' => false],
                    ['answer_text' => 'Cap Go Meh', 'is_correct' => false],
                ]
            ],
            [
                'question_text' => "What is the name of the traditional Sundanese batik from bogor?",
                'difficulty_level' => 'easy',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => null,
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Batik Pakuan', 'is_correct' => true],
                    ['answer_text' => 'Tenun', 'is_correct' => false],
                    ['answer_text' => 'Sasirangan', 'is_correct' => false],
                    ['answer_text' => 'Kecapi Suling', 'is_correct' => false],
                ]
            ],

        ];

        foreach ($questions as $question) {
            $questionId = DB::table('questions')->insertGetId([
                'question_text' => $question['question_text'],
                'difficulty_level' => $question['difficulty_level'],
                'category_id' => $question['category_id'],
                'user_id' => $question['user_id'],
                'image_url' => $question['image_url'],
                'points' => $question['points'],
            ]);

            foreach ($question['answers'] as $answer) {
                DB::table('answers')->insert([
                    'question_id' => $questionId,
                    'answer_text' => $answer['answer_text'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
    }
}
