<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
            array('name'=>'USD','description'=>'US Dollars','exchange_rate'=>'0.0808279','surcharge'=>'7.5','action'=>0),
            array('name'=>'GBP','description'=>'British Pound','exchange_rate'=>'0.0527032','surcharge'=>'5.0','action'=>1),
            array('name'=>'EUR','description'=>'EURO','exchange_rate'=>'0.0718710','surcharge'=>'5.0','action'=>1),
            array('name'=>'KES','description'=>'Kenyan Shilling','exchange_rate'=>'7.81498','surcharge'=>'2.5','action'=>0)
        );

        foreach ($currencies as $currency) {

            \App\Currency::create($currency);
        }
    }
}
