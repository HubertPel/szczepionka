<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            [
                'question' => 'Kto powinien się testować na COVID-19?',
                'answer' => 'Osoby, które mają objawy związane z COVID-19, takie jak gorączka, kaszel, trudności w oddychaniu, utrata smaku lub węchu, lub miały kontakt z osobą zakażoną COVID-19, powinny się poddać testowi na COVID-19.',
                'active' => 1,
            ],
            [
                'question' => 'Jakie są rodzaje testów na COVID-19?',
                'answer' => 'Istnieją dwa główne rodzaje testów na COVID-19: testy wirusowe (takie jak test PCR lub antygenowy) i testy przeciwciał (takie jak test ELISA lub test szybki).',
                'active' => 1,
            ],
            [
                'question' => 'Jaki jest czas oczekiwania na wyniki testu na COVID-19?',
                'answer' => 'Czas oczekiwania na wyniki testu na COVID-19 zależy od rodzaju testu i lokalizacji, w której został wykonany. Testy wirusowe mogą dać wynik w ciągu kilku godzin do kilku dni, a testy przeciwciał mogą zająć kilka dni.',
                'active' => 1,
            ],
            [
                'question' => 'Czy testy na COVID-19 są dokładne?',
                'answer' => 'Żaden test na COVID-19 nie jest w 100% dokładny. Testy wirusowe mają tendencję do być bardziej dokładne niż testy przeciwciał, ale wynik testu może być wpływany przez wiele czynników, takich jak sposób pobierania próbki i okres inkubacji.',
                'active' => 1,
            ],
            [
                'question' => 'Czy muszę odizolować się przed wykonaniem testu na COVID-19?',
                'answer' => 'Tak, jeśli podejrzewasz, że masz COVID-19 lub miałeś kontakt z osobą zakażoną COVID-19, powinieneś pozostać w izolacji przed wykonaniem testu. W ten sposób unikniesz potencjalnego rozprzestrzeniania się wirusa, jeśli jesteś zakażony.',
                'active' => 1,
            ],
            [
                'question' => 'Czy mogę być zakażony COVID-19, mimo negatywnego wyniku testu?',
                'answer' => 'Tak, jest to możliwe. Wynik testu może być fałszywie negatywny, szczególnie jeśli zostanie wykonany w okresie inkubacji lub jeśli próbka nie została prawidłowo pobrana. Dlatego ważne jest, aby nadal przestrzegać zasad bezpieczeństwa, takich jak noszenie maseczki i zachowanie dystansu społecznego.',
                'active' => 1,
            ],
            [
                'question' => 'Czy muszę się testować na COVID-19 po zakończeniu kwarantanny?',
                'answer' => 'Nie zawsze. W przypadku osób, które były w izolacji po kontakcie z osobą zakażoną COVID-19, zaleca się testowanie na COVID-19 po zakończeniu kwarantanny, ale w przypadku osób, które miały objawy COVID-19, testowanie może być niepotrzebne, jeśli objawy już ustąpiły.',
                'active' => 1,
            ],
            [
                'question' => 'Który test na COVID-19 jest bardziej dokładny - test antygenowy czy PCR?',
                'answer' => 'Test PCR jest uważany za bardziej dokładny niż test antygenowy, ale wymaga dłuższego czasu na wynik i jest zwykle droższy.',
                'active' => 1,
            ],
            [
                'question' => 'Czy test na COVID-19 jest bolesny?',
                'answer' => 'Test na COVID-19 polega na pobraniu wymazu z nosa lub gardła, co może powodować pewien dyskomfort, ale nie powinno być bolesne.',
                'active' => 1,
            ],
            [
                'question' => 'Jak długo trwa przeprowadzenie testu na COVID-19?',
                'answer' => 'Czas przeprowadzenia testu na COVID-19 zależy od rodzaju testu. Test antygenowy można wykonać w ciągu kilku minut, podczas gdy test PCR może trwać kilka dni na uzyskanie wyników.',
                'active' => 1,
            ]
        ]);
    }
}
