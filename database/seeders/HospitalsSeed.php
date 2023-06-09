<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitalsAarray = [
            [
                'city_id' => 1, // warszawa
                'hospitals' => [
                    array(
                        'name' => 'Punkt Szczepień Ursynów',
                        'address' => 'ul. Pileckiego 122A, 02-781 Warszawa',
                        'phone' => '+48 22 279 77 77',
                        'email' => 'ursynow@szczepimysie.waw.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-16:00, sobota: 9:00-13:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>9, 'end' => 13]])
                    ),
                    array(
                        'name' => 'Punkt Szczepień Mokotów',
                        'address' => 'ul. Racjonalizacji 8A, 02-673 Warszawa',
                        'phone' => '+48 22 827 77 77',
                        'email' => 'mokotow@szczepimysie.waw.pl',
                        'hours' => 'Poniedziałek-piątek: 9:00-17:00, sobota: 10:00-14:00',
                        'hours_data' => json_encode([['start'=>9, 'end' => 17],['start'=>9, 'end' => 17],['start'=>9, 'end' => 17],['start'=>9, 'end' => 17],['start'=>9, 'end' => 17],['start'=>10, 'end' => 14]])
                    ),
                    array(
                        'name' => 'Punkt Szczepień Bielany',
                        'address' => 'ul. Władysława Broniewskiego 11, 01-901 Warszawa',
                        'phone' => '+48 22 867 77 77',
                        'email' => 'bielany@szczepimysie.waw.pl',
                        'hours' => 'Poniedziałek-piątek: 10:00-18:00, sobota: 11:00-15:00',
                        'hours_data' => json_encode([['start'=>10, 'end' => 18],['start'=>10, 'end' => 18],['start'=>10, 'end' => 18],['start'=>10, 'end' => 18],['start'=>10, 'end' => 18],['start'=>11, 'end' => 15]])
                    ),
                    array(
                        'name' => 'Punkt Szczepień Wola',
                        'address' => 'ul. Sowińskiego 5A, 01-496 Warszawa',
                        'phone' => '+48 22 835 77 77',
                        'email' => 'wola@szczepimysie.waw.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-16:00, sobota: 9:00-13:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>8, 'end' => 16],['start'=>9, 'end' => 13]])
                    ),
                    array(
                        'name' => 'Punkt Szczepień Śródmieście',
                        'address' => 'ul. Nowogrodzka 76, 02-018 Warszawa',
                        'phone' => '+48 22 505 22 33',
                        'email' => 'srodmiescie.szczepienia@wp.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-20:00, sobota: 9:00-16:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>9, 'end' => 16]])
                    ),
                ]
            ],
            [
                'city_id' => 2, // krakow
                'hospitals' => [
                    array(
                        'name' => 'Krakowski Szpital Specjalistyczny im. Jana Pawła II',
                        'address' => 'ul. Prądnicka 80, 31-202 Kraków',
                        'phone' => '+48 12 614 20 00',
                        'email' => 'szpital@kss.krakow.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-20:00, sobota-niedziela: 9:00-16:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>8, 'end' => 20],['start'=>9, 'end' => 16]])
                    ),
                    array(
                        'name' => 'Centrum Medyczne Damiana',
                        'address' => 'ul. Sarego 12, 31-047 Kraków',
                        'phone' => '+48 12 429 22 00',
                        'email' => 'szczepienia@damian.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-18:00, sobota: 9:00-15:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>9, 'end' => 15]])
                    ),
                    array(
                        'name' => 'Medicover Kraków',
                        'address' => 'ul. Długa 72, 31-146 Kraków',
                        'phone' => '+48 22 33 77 500',
                        'email' => 'szczepienia@medicover.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-18:00, sobota: 9:00-15:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>9, 'end' => 15]])
                    ),
                    array(
                        'name' => 'Centrum Medyczne NZOZ Zdrowie',
                        'address' => 'ul. Królewska 65, 30-081 Kraków',
                        'phone' => '+48 12 422 11 11',
                        'email' => 'rejestracja@zdrowie-krakow.pl',
                        'hours' => 'Poniedziałek-piątek: 7:00-19:00, sobota: 8:00-14:00',
                        'hours_data' => json_encode([['start'=>7, 'end' => 19],['start'=>7, 'end' => 19],['start'=>7, 'end' => 19],['start'=>7, 'end' => 19],['start'=>7, 'end' => 19],['start'=>8, 'end' => 14]])
                    ),
                    array(
                        'name' => 'Medicover Kraków - Centrum Medyczne',
                        'address' => 'ul. Rzemieślnicza 35, 30-403 Kraków',
                        'phone' => '+48 22 33 77 500',
                        'email' => 'szczepienia@medicover.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-18:00, sobota: 9:00-15:00',
                        'hours_data' => json_encode([['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>9, 'end' => 15]])
                    ),
                ]
            ],
            [
                'city_id' => 3, // łódz
                'hospitals' => [    
                    array(
                        'name' => 'Łódzkie Centrum Szczepień',
                        'address' => 'ul. Pomorska 105/107, 90-406 Łódź',
                        'phone' => '+48 42 677 79 60',
                        'email' => 'kontakt@lodzkiecentrumszczepien.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-20:00, sobota: 9:00-15:00'
                    ),
                    array(
                        'name' => 'Szpital im. dr Wł. Biegańskiego',
                        'address' => 'ul. Kopcińskiego 22, 90-153 Łódź',
                        'phone' => '+48 42 272 40 02',
                        'email' => 'szpital@szpitalbieganskiego.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-20:00, sobota-niedziela: 9:00-15:00'
                    ),
                    array(
                        'name' => 'Specjalistyczny Szpital Miejski im. dr W. Biegańskiego',
                        'address' => 'ul. Kniaziewicza 1/5, 91-347 Łódź',
                        'phone' => '+48 42 271 40 00',
                        'email' => 'rejestracja@ssm.lodz.pl',
                        'hours' => 'Poniedziałek-piątek: 7:00-19:00, sobota: 8:00-14:00'
                    ),
                    array(
                        'name' => 'NZOZ Wojewódzki Szpital Specjalistyczny im. M. Kopernika',
                        'address' => 'ul. Kopcińskiego 22, 90-153 Łódź',
                        'phone' => '+48 42 272 40 02',
                        'email' => 'szpital@szpitalbieganskiego.pl',
                        'hours' => 'Poniedziałek-piątek: 8:00-20:00, sobota-niedziela: 9:00-15:00'
                    ),
                    array(
                        'name' => 'Szpital Wojewódzki im. dr. Józefa Babińskiego',
                        'address' => 'ul. Czechosłowacka 8/10, 92-216 Łódź',
                        'phone' => '+48 42 271 52 00',
                        'email' => 'szpital@szpital-babinskiego.lodz.pl',
                        'hours' => 'Poniedziałek-piątek: 7:00-19:00, sobota: 8:00-14:00'
                    ),
                ]
            ],
            [
                'city_id' => 4, // wroclaw
                'hospitals' => [
                    array(
                        'name' => 'Punkt Szczepień - Centrum Handlowe Magnolia',
                        'address' => 'Legnicka 58, 54-204 Wrocław',
                        'phone' => '+48 800 190 590',
                        'email' => 'szczepienia.wroclaw@magnolia-park.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Galeria Dominikańska',
                        'address' => 'pl. Dominikański 3, 50-159 Wrocław',
                        'phone' => '+48 784 780 420',
                        'email' => 'szczepienia.wroclaw@galeria-dominikanska.com',
                        'hours' => 'pn-sb: 9:00-19:00, nd: 10:00-18:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Magnolia Park',
                        'address' => 'Legnicka 58, 54-204 Wrocław',
                        'phone' => '+48 500 047 772',
                        'email' => 'szczepienia@magnoliapark.com.pl',
                        'hours' => 'pn-sb: 8:00-20:00, nd: 9:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Sky Tower',
                        'address' => 'Powstańców Śląskich 95, 53-332 Wrocław',
                        'phone' => '+48 797 080 198',
                        'email' => 'szczepienia@skytower.com.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Pasaż Grunwaldzki',
                        'address' => 'Plac Grunwaldzki 22, 50-363 Wrocław',
                        'phone' => '+48 535 480 808',
                        'email' => 'szczepienia@pasazgrunwaldzki.pl',
                        'hours' => 'pn-sb: 9:00-21:00, nd: 10:00-20:00'
                    )
                ]
            ],
            [
                'city_id' => 5, // poznan
                'hospitals' => [
                    array(
                        'name' => 'Punkt Szczepień - Hala Arena',
                        'address' => 'Stanisława Żółkiewskiego 7, 60-965 Poznań',
                        'phone' => '+48 61 670 08 50',
                        'email' => 'szczepienia@halaarena.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Malta Office Park',
                        'address' => 'Malta Office Park, ul. Krańcowa 5, 61-151 Poznań',
                        'phone' => '+48 535 131 515',
                        'email' => 'szczepienia@maltapark.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Stadion Miejski',
                        'address' => 'ul. Bułgarska 17, 60-320 Poznań',
                        'phone' => '+48 500 209 505',
                        'email' => 'szczepienia@stadionpoznan.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Galeria Malta',
                        'address' => 'ul. Abpa A. Baraniaka 8, 61-131 Poznań',
                        'phone' => '+48 733 357 357',
                        'email' => 'szczepienia@galeriamalta.pl',
                        'hours' => 'pn-sb: 9:00-21:00, nd: 10:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Galeria Posnania',
                        'address' => 'ul. Pleszewska 1, 61-136 Poznań',
                        'phone' => '+48 61 209 44 66',
                        'email' => 'szczepienia@galeriaposnania.pl',
                        'hours' => 'pn-sb: 9:00-21:00, nd: 10:00-20:00'
                    )
                ]
            ],
            [
                'city_id' => 6, // gdansk
                'hospitals' => [
                    array(
                        'name' => 'Punkt Szczepień - Amber Expo',
                        'address' => 'Żaglowa 11, 80-560 Gdańsk',
                        'phone' => '+48 22 250 88 88',
                        'email' => 'szczepienia@amberexpo.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Ergo Arena',
                        'address' => 'Pokoleń Lechii Gdańsk 1, 80-560 Gdańsk',
                        'phone' => '+48 58 768 87 00',
                        'email' => 'szczepienia@ergoarena.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Gdańsk International Fair Co.',
                        'address' => 'Świętokrzyska 14, 80-180 Gdańsk',
                        'phone' => '+48 58 554 92 00',
                        'email' => 'szczepienia@gmfa.pl',
                        'hours' => 'pn-nd: 8:00-20:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - Alfa Centrum',
                        'address' => 'al. Grunwaldzka 82, 80-244 Gdańsk',
                        'phone' => '+48 58 347 05 17',
                        'email' => 'szczepienia@alfacentrum.pl',
                        'hours' => 'pn-pt: 9:00-19:00, sb: 9:00-14:00'
                    ),
                    array(
                        'name' => 'Punkt Szczepień - ZTM Gdańsk',
                        'address' => 'ul. 3 Maja 12, 80-822 Gdańsk',
                        'phone' => '+48 58 307 40 11',
                        'email' => 'szczepienia@ztm.gda.pl',
                        'hours' => 'pn-pt: 8:00-18:00'
                    )
                ]
            ],
            [
                'city_id' => 10, // katowice
                'hospitals' => [
                    array(
                        "name" => "Miejski Ośrodek Zdrowia Katowice",
                        "address" => "ul. Raciborska 27, 40-074 Katowice",
                        "phone" => "+48 32 256 67 00",
                        "email" => "rejestracja.moz@moz.katowice.pl",
                        "hours" => "poniedziałek-piątek: 8:00-16:00"
                    ),
                    array(
                        "name" => "Uniwersytecki Szpital Kliniczny nr 1 im. Andrzeja Mielęckiego Śląskiego Uniwersytetu Medycznego w Katowicach",
                        "address" => "ul. Ziołowa 45/47, 40-635 Katowice",
                        "phone" => "+48 32 789 45 00",
                        "email" => "",
                        "hours" => "poniedziałek-piątek: 8:00-16:00"
                    ),
                    array(
                        "name" => "Regionalne Centrum Krwiodawstwa i Krwiolecznictwa w Katowicach",
                        "address" => "ul. Raciborska 15, 40-074 Katowice",
                        "phone" => "+48 32 207 80 00",
                        "email" => "",
                        "hours" => "poniedziałek-piątek: 7:30-15:30"
                    ),
                    array(
                        "name" => "Miejska Przychodnia nr 4 w Katowicach",
                        "address" => "ul. Zimowa 5, 40-708 Katowice",
                        "phone" => "+48 32 358 24 00",
                        "email" => "",
                        "hours" => "poniedziałek-piątek: 8:00-20:00"
                    ),
                    array(
                        "name" => "Przychodnia Specjalistyczna MSWiA w Katowicach",
                        "address" => "ul. Andrzeja Mielęckiego 5, 40-736 Katowice",
                        "phone" => "+48 32 730 90 00",
                        "email" => "",
                        "hours" => "poniedziałek-piątek: 8:00-20:00"
                    )
                ]
            ],
            [
                'city_id' => 12, // gdynia
                'hospitals' => [
                    array(
                        'name' => 'Punkt szczepień Gdynia Północ',
                        'address' => 'ul. Świętojańska 122',
                        'phone' => '+48 58 661 90 54',
                        'email' => 'szczepienia@gdynia.pl',
                        'hours' => 'pn-pt: 8:00-18:00, sb-nd: 9:00-15:00'
                      ),
                      array(
                        'name' => 'Punkt szczepień Gdynia Śródmieście',
                        'address' => 'ul. Świętojańska 25',
                        'phone' => '+48 58 661 90 54',
                        'email' => 'szczepienia@gdynia.pl',
                        'hours' => 'pn-pt: 8:00-18:00, sb-nd: 9:00-15:00'
                      ),
                      array(
                        'name' => 'Punkt szczepień Gdynia Orłowo',
                        'address' => 'ul. Jana z Kolna 6',
                        'phone' => '+48 58 661 90 54',
                        'email' => 'szczepienia@gdynia.pl',
                        'hours' => 'pn-pt: 8:00-18:00, sb-nd: 9:00-15:00'
                      ),
                      array(
                        'name' => 'Punkt szczepień Gdynia Mały Kack',
                        'address' => 'ul. Morska 297',
                        'phone' => '+48 58 661 90 54',
                        'email' => 'szczepienia@gdynia.pl',
                        'hours' => 'pn-pt: 8:00-18:00, sb-nd: 9:00-15:00'
                      )
                ]
            ],
            [
                'city_id' => 16, // torun
                'hospitals' => [
                    array(
                        "name" => "Centrum Medyczne SanaMed",
                        "address" => "ul. Czerwona Droga 5",
                        "phone" => "56 610 85 00",
                        "email" => "sanamed@sanamed.pl",
                        "hours" => "Pn - Pt: 08:00 - 18:00, Sob: 08:00 - 14:00"
                      ),
                      array(
                        "name" => "Poradnia Zdrowia Psychicznego",
                        "address" => "ul. Słowackiego 45",
                        "phone" => "56 654 23 56",
                        "email" => "pzs@pzs.pl",
                        "hours" => "Pn - Pt: 08:00 - 16:00"
                      ),
                      array(
                        "name" => "Wojewódzki Szpital Zespolony",
                        "address" => "ul. Stefczyka 1/3",
                        "phone" => "56 654 00 00",
                        "email" => "szpital@wcztoruniu.pl",
                        "hours" => "Pn - Pt: 08:00 - 20:00, Sob: 08:00 - 14:00"
                      )
                ]
            ],
        ];

        foreach ($hospitalsAarray as $city) {
            foreach ($city['hospitals'] as $hospital) {
                $hospital['city_id'] = $city['city_id'];
                if (!isset($hospital['hours_data'])) {
                    $hospital['hours_data'] = json_encode([['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>8, 'end' => 18],['start'=>9, 'end' => 15]]);
                }
                DB::table('hospitals')->insert($hospital);
            }
        }
    }
}
