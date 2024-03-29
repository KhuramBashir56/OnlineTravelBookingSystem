<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Islamabad',
            'Karachi',
            'Abbaspur',
            'Lahore',
            'Abbottabad',
            'Abdul Hakim',
            'Adda Jahan Khan',
            'Adda Shaiwala',
            'Ahmadpur East',
            'Ahmed pur Sial',
            'Akhora Khattak',
            'Ali Chak',
            'Alipur',
            'Allahabad',
            'Amangarh',
            'Ambela',
            'Arifwala',
            'Astore',
            'Attock',
            'Babri Banda',
            'Badin',
            'Bagh',
            'Bahawalnagar',
            'Bahawalpur',
            'Bajaur',
            'Balakot',
            'Bannu',
            'Barbar Loi',
            'Barkhan',
            'Baroute',
            'Bat Khela',
            'Battagram',
            'Besham',
            'Bewal',
            'Bhakkar',
            'Bhalwal',
            'Bhan Saeedabad',
            'Bhara Kahu',
            'Bhera',
            'Bhimbar',
            'Bhirya Road',
            'Bhuawana',
            'Bisham',
            'Blitang',
            'Bolan',
            'Buchay Key',
            'Bunner',
            'Burewala',
            'Chacklala',
            'Chaghi',
            'Chaininda',
            'Chak 4 b c',
            'Chak 46',
            'Chak Jamal',
            'Chak Jhumra',
            'Chak Sawara',
            'Chak Sheza',
            'Chakwal',
            'Chaman',
            'Charsada',
            'Chashma',
            'Chawinda',
            'Cherat',
            'Chicha watni',
            'Chilas',
            'Chiniot',
            'Chishtian',
            'Chitral',
            'Choa Saiden Shah',
            'Chohar Jamali',
            'Choppar Hatta',
            'Chowk Azam',
            'Chowk Maitla',
            'Chowk Munda',
            'Chunian',
            'Dadakhel',
            'Dadu',
            'Daharki',
            'Dandot',
            'Dargai',
            'Darra Pezu',
            'Darya Khan',
            'Daska',
            'Dassu',
            'Daud Khel',
            'Daulat Pur',
            'Daur',
            'Deh Pathaan',
            'Depal Pur',
            'Dera Bugti',
            'Dera Ghazi Khan',
            'Dera Ismail Khan',
            'Dera Murad Jamali',
            'Dera Nawab Sahib',
            'Dhatmal',
            'Dhirkot',
            'Dhoun Kal',
            'Diamer',
            'Digri',
            'Dijkot',
            'Dina',
            'Dinga',
            'Dir',
            'Doaaba',
            'Doltala',
            'Domeli',
            'Dudial',
            'Dunyapur',
            'Eminabad',
            'Faisalabad',
            'Farooqabad',
            'Fateh Jang',
            'Fateh Pur',
            'Feroz Walla',
            'Feroz Watan',
            'Fizagat',
            'Fort Abbas',
            'FR Bannu',
            'FR Bannu / Lakki',
            'FR DI Khan',
            'FR Kohat',
            'FR Peshawar',
            'FR Peshawar / Kohat',
            'FR Tank / DI Khan',
            'Gadoon Amazai',
            'Gaggo Mandi',
            'Gakhar Mandi',
            'Gambet',
            'Garh Maharaja',
            'Garh More',
            'Gari Habibullah',
            'Gari Mori',
            'Ghari Dupatta',
            'Gharo',
            'Ghazi',
            'Ghizer',
            'Ghotki',
            'Ghuzdar',
            'Gilgit',
            'Gohar Ghoushti',
            'Gojra',
            'Goular Khel',
            'Guddu',
            'Gujar Khan',
            'Gujranwala',
            'Gujrat',
            'Gwadar',
            'Hafizabad',
            'Hala',
            'Hangu',
            'Hari Pur',
            'Hariwala',
            'Harnai',
            'Haroonabad',
            'Hasilpur',
            'Hassan Abdal',
            'Hattar',
            'Hattian',
            'Haveli Kahuta',
            'Haveli Lakha',
            'Havelian',
            'Hayatabad',
            'Hazro',
            'Head Marala',
            'Hub Chowki',
            'Hub Inds Estate',
            'Hujra Shah Muqeem',
            'Hunza Nagar',
            'Hyderabad',
            'Issa Khel',
            'Jacobabad',
            'Jaffarabad',
            'Jaja Abasian',
            'Jalal Pur Jatan',
            'Jalal Pur Priwala',
            'Jalozai',
            'Jampur',
            'Jamrud Road',
            'Jamshoro',
            'Jandanwala',
            'Jaranwala',
            'Jatoi',
            'Jauharabad',
            'Jehangira',
            'Jehanian',
            'Jhal Magsi',
            'Jhand',
            'Jhang',
            'Jhatta Bhutta',
            'Jhelum',
            'Jhudo',
            'Kabir Wala',
            'Kacha Khooh',
            'Kachhi/Bolan',
            'Kahror Pacca',
            'Kahuta',
            'Kakul',
            'Kakur Town',
            'Kala Bagh',
            'Kala Shah Kaku',
            'Kalam',
            'Kalar Syedian',
            'Kalaswala',
            'Kallat',
            'Kallur Kot',
            'Kamalia',
            'Kamalia Musa',
            'Kamber Ali Khan',
            'Kamokey',
            'Kamra',
            'Kandhkot',
            'Kandiaro',
            'Karak',
            'Karore Lalisan',
            'Kashmir',
            'Kashmore',
            'Kasur',
            'Kazi Ahmed',
            'Kech',
            'Khair Pur',
            'Khair Pur Mir',
            'Khairpur Nathan Shah',
            'Khanbela',
            'Khandabad',
            'Khanewal',
            'Khangarh',
            'Khanpur',
            'Khanqah Dogran',
            'Khanqah Sharif',
            'Kharan',
            'Kharian',
            'Khewra',
            'Khoski',
            'Khuiratta',
            'Khurian wala',
            'Khushab',
            'Khushal Kot',
            'Khuzdar',
            'Khyber Agency',
            'Killa Abdullah',
            'Killa Saifullah',
            'Kohat',
            'Kohistan',
            'Kohlu',
            'Kot Addu',
            'Kot Bunglow',
            'Kot Ghulam Mohd',
            'Kot Mithan',
            'Kot Radha Kishan',
            'Kotla',
            'Kotla Arab Ali Khan',
            'Kotla Jam',
            'Kotla Pathan',
            'Kotli',
            'Kotli Loharan',
            'Kotmomin',
            'Kotri',
            'Kumbh',
            'Kundina',
            'Kunjah',
            'Kunri',
            'Kurram',
            'Kurram Agency',
            'Lakimarwat',
            'Lakki Marwat',
            'Lala rukh',
            'Lalamusa',
            'Laliah',
            'Lalshanra',
            'Landi Kotal',
            'Larkana',
            'Lasbela',
            'Lawrence pur',
            'Layyah',
            'Leepa',
            'Liaquat Pur',
            'Lodhran',
            'Loralai',
            'Lower Dir',
            'Ludhan',
            'Machh',
            'Machi Goth',
            'Madinah',
            'Mailsi',
            'Makli',
            'Makran',
            'Malakand',
            'Malakwal',
            'Mamu kunjan',
            'Mandi Bahauddin',
            'Mandi Faizabad',
            'Mandra',
            'Manga Mandi',
            'Mangal Sada',
            'Mangi',
            'Mangla',
            'Mangowal',
            'Manoabad',
            'Mansehra',
            'Mardan',
            'Mari Indus',
            'Mastoi',
            'Matiari',
            'Matli',
            'Mehar',
            'Mehmood Kot',
            'Mehrab Pur',
            'Mian Chunnu',
            'Mian Walli',
            'Minchanabad',
            'Mingora',
            'Mir Ali',
            'Miran Shah',
            'Mirpur  JK)',
            'Mirpur Khas',
            'Mirpur Mathelo',
            'Mithi',
            'Mohen Jo Daro',
            'Mohmand',
            'More kunda',
            'Morgah',
            'Moro',
            'Mubarik Pur',
            'Multan',
            'Muridkay',
            'Murree',
            'Musafir Khana',
            'Musakhel',
            'Mustang',
            'Muzaffarabad',
            'Muzaffargarh',
            'Nankana Sahib',
            'Narang Mandi',
            'Narowal',
            'Naseerabad',
            'Naudero',
            'Naukot',
            'Naukundi',
            'Nawab Shah',
            'Neelam',
            'New Saeedabad',
            'Nilam',
            'Nilore',
            'Noor kot',
            'Nooriabad',
            'Noorpur nooranga',
            'North Wazirstan',
            'Noshki',
            'Nowshera',
            'Nowshera Cantt',
            'Nowshero Feroz',
            'Okara',
            'Orakzai',
            'Padidan',
            'Pak Pattan Sharif',
            'Panjan Kisan',
            'Panjgur',
            'Pannu aqil',
            'Parachinar',
            'Pasni',
            'Pasroor',
            'Patika',
            'Patoki',
            'Peshawar',
            'Phagwar',
            'Phalia',
            'Phool nagar',
            'Phoolnagar hai Pheru)',
            'Piaro goth',
            'Pind Dadan Khan',
            'Pindi Bhattian',
            'Pindi bhohri',
            'Pindi gheb',
            'Piplan',
            'Pir Mahal',
            'Pirpai',
            'Pishin',
            'Poonch',
            'Punch',
            'Qalandarabad',
            'Qambar',
            'Qambar Shahdatkot',
            'Qasba Gujrat',
            'Qazi Ahmed',
            'Quaidabad',
            'Quetta',
            'Rabwah',
            'Rahimyar Khan',
            'Rahwali',
            'Raiwind',
            'Rajana',
            'Rajanpur',
            'Rangoo',
            'Ranipur',
            'Rashidabad',
            'Ratto Dero',
            'Rawala Kot',
            'Rawalpindi',
            'Rawat',
            'Renala Khurd',
            'Risalpur',
            'Rohri',
            'Sadiqabad',
            'Sagri',
            'Sahiwal',
            'Saidu Sharif',
            'Sajawal',
            'Sakardu',
            'Sakrand',
            'Sambrial',
            'Samma Satta',
            'Samundri',
            'Sanghar',
            'Sanghi',
            'Sangla Hill',
            'Sangote',
            'Sanjwal',
            'Sara e Naurang',
            'Sarai Alamgir',
            'Sargodha',
            'Satyana Bangla',
            'Sehar Baqlas',
            'Sehwan',
            'Shadiwal',
            'Shahdad Kot',
            'Shahdad Pur',
            'Shaheed Benazirabad',
            'Shahkot',
            'Shahpur Chakar',
            'Shakargarh',
            'Shamsabad',
            'Shangla',
            'Shankiari',
            'Shedani sharif',
            'Sheikhupura',
            'Shemier',
            'Sherani',
            'Shikarpur',
            'Shogram',
            'Shorkot',
            'Shujabad',
            'Sialkot',
            'Sibi',
            'Sidhnoti',
            'Sihala',
            'Sikandarabad',
            'Silanwala',
            'Sita Road',
            'Skardu',
            'Sohawa District Daska',
            'Sohawa District Jelum',
            'Sohbatpur',
            'South Wazirstan',
            'Sudhnoti',
            'Sukkur',
            'Swabi',
            'Swat',
            'Swatmingora',
            'Takhtbai',
            'Talagang',
            'Talamba',
            'Talhur',
            'Tall',
            'Tando Adam',
            'Tando Allahyar',
            'Tando Jam',
            'Tando Mohd Khan',
            'Tank',
            'Tarbela',
            'Tarmatan',
            'Tarnol',
            'Taunsa sharif',
            'Taxila',
            'Thana Bula Khan',
            'Thari Mirwah',
            'Tharo Shah',
            'Tharparkar',
            'Thatta',
            'Theing Jattan More',
            'Thul',
            'Tibba Sultanpur',
            'Timergara',
            'Tobatek Singh',
            'Topi',
            'Toru',
            'Trinda Mohd Pannah',
            'Turbat',
            'Ubaro',
            'Ugoki',
            'Ukba',
            'Umer Kot',
            'Upper Deval',
            'Upper Dir',
            'Usta Mohammad',
            'Utror',
            'Vehari',
            'Village Sunder',
            'Wah Cantt',
            'Wahi hassain',
            'Wan Radha Ram',
            'Wana',
            'Warah',
            'Warburton',
            'Washuk',
            'Wazirabad',
            'Yazman Mandi',
            'Zahir Pir',
            'Zhob',
            'Ziarat'
        ];

        foreach ($cities as $city) {
            $exist_city = City::where('name', $city)->first();
            if (empty($exist_city)) {
                City::create([
                    'name' => $city
                ]);
            } else {
                $exist_city = null;
            }
        }
    }
}