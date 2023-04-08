<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Pesel implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        $pesel = $value;
        // Klasyczna walidacja wg algorytmu Luhna w implementacji PESEL
        $arrWagi = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); // tablica z odpowiednimi wagami
        $intSum = 0;
        for ($i = 0; $i < 10; $i++) {
            $intSum += $arrWagi[$i] * $pesel[$i]; //mnożymy każdy ze znaków dla 10 pierwszych cyfr przez wagę i sumujemy wszystko
        }
        $int = 10 - $intSum % 10; //obliczamy sumę kontrolną i porównujemy ją z ostatnią cyfrą.
        $intControlNr = ($int == 10)?0:$int; //sprawdzamy czy taka sama suma kontrolna jest w ciągu
        if ($intControlNr == $pesel[10]){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Podany pesel jest zły   .';
    }
}
