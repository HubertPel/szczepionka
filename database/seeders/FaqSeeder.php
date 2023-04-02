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
                'question' => 'Jakie są skutki uboczne szczepionki przeciw COVID-19?',
                'answer' => 'Skutki uboczne szczepionki COVID-19 są zwykle łagodne i obejmują ból w miejscu wstrzyknięcia, zmęczenie, bóle głowy, gorączkę, dreszcze i bóle mięśniowe. W rzadkich przypadkach mogą wystąpić poważniejsze skutki uboczne, takie jak reakcje alergiczne, ale są one bardzo rzadkie.',
                'active' => 1,
            ],
            [
                'question' => 'Czy szczepionka przeciw COVID-19 jest skuteczna?',
                'answer' => 'Tak, szczepionki przeciw COVID-19 są skuteczne w zapobieganiu zakażeniu koronawirusem i chorobie COVID-19. Skuteczność szczepionek zależy od rodzaju szczepionki i wariantu wirusa, ale ogólnie rzecz biorąc, szczepionki są bardzo skuteczne w zapobieganiu chorobie i zmniejszaniu ciężkości choroby u osób zakażonych.',
                'active' => 1,
            ],
            [
                'question' => 'Czy mogę zakażać się i przenosić COVID-19 po zaszczepieniu?',
                'answer' => 'Chociaż szczepionki przeciw COVID-19 są skuteczne w zapobieganiu chorobie, to nadal istnieje ryzyko, że można się zakażyć i przenieść wirusa, zwłaszcza jeśli jest się w bezpośrednim kontakcie z osobą zakażoną. Dlatego zaleca się stosowanie środków ostrożności, takich jak noszenie maseczki i utrzymywanie dystansu społecznego, szczególnie w przypadku kontaktu z osobami, które nie zostały zaszczepione.',
                'active' => 1,
            ],
            [
                'question' => 'Czy szczepionka przeciw COVID-19 jest bezpieczna dla kobiet w ciąży i karmiących piersią?',
                'answer' => 'Badania kliniczne nad bezpieczeństwem szczepionek przeciw COVID-19 u kobiet w ciąży i karmiących piersią są ograniczone, ale obecne dowody wskazują na to, że szczepionki są bezpieczne dla tych grup. Zaleca się, aby kobiety w ciąży lub karmiące piersią omówiły z lekarzem potencjalne korzyści i ryzyka związane z przyjęciem szczepionki.',
                'active' => 1,
            ],
            [
                'question' => 'Czy szczepionka przeciw COVID-19 wpłynie na moją płodność?',
                'answer' => 'Nie ma dowodów na to, że szczepionka przeciw COVID-19 wpływa na płodność mężczyzn lub kobiet. Nie ma również dowodów na to, że szczepionka może prowadzić do problemów w ciąży lub u noworodków.',
                'active' => 1,
            ],
            [
                'question' => 'Czy muszę przyjmować drugą dawkę szczepionki?',
                'answer' => 'Tak, większość szczepionek przeciw COVID-19 wymaga dwóch dawek, aby zapewnić pełną ochronę przed chorobą.',
                'active' => 1,
            ],
            [
                'question' => 'Czy mogę przyjmować inne leki lub suplementy przed lub po zaszczepieniu?',
                'answer' => 'Przed przyjęciem szczepionki przeciw COVID-19 należy skonsultować się z lekarzem, jeśli przyjmuje się jakiekolwiek leki lub suplementy, aby upewnić się, że nie będą one wpływać na skuteczność lub bezpieczeństwo szczepionki. Po przyjęciu szczepionki nie ma konieczności zmiany rutynowej terapii lub suplementacji.',
                'active' => 1,
            ],
            [
                'question' => 'Czy osoby z chorobami przewlekłymi powinny przyjmować szczepionkę przeciw COVID-19?',
                'answer' => 'Osoby z chorobami przewlekłymi są narażone na ciężki przebieg choroby COVID-19, dlatego zaleca się, aby przyjęły szczepionkę przeciw COVID-19. Osoby z chorobami przewlekłymi powinny skonsultować się z lekarzem przed przyjęciem szczepionki, aby omówić potencjalne ryzyka i korzyści.',
                'active' => 1,
            ],
            [
                'question' => 'Czy mogę wybrać szczepionkę, którą chcę się zaszczepić?',
                'answer' => 'W niektórych krajach istnieje możliwość wyboru szczepionki, ale nie we wszystkich. W większości przypadków szczepionki są przypisywane według dostępności i zapotrzebowania na dany region lub grupę wiekową. W każdym przypadku zaleca się przyjęcie dostępnej szczepionki, ponieważ wszystkie są skuteczne w zapobieganiu chorobie COVID-19.',
                'active' => 1,
            ],
            [
                'question' => 'Czy potrzebuję szczepionki, jeśli już miałem COVID-19?',
                'answer' => 'Tak, zaleca się, aby osoby, które przechorowały COVID-19, zaszczepiły się przeciwko chorobie, ponieważ nie wiadomo, jak długo trwa naturalna odporność na COVID-19. Szczepionka może również pomóc w ochronie przed poważnymi objawami i ciężkim przebiegiem choroby, szczególnie w przypadku nowych wariantów wirusa.',
                'active' => 1,
            ]
        ]);
    }
}
