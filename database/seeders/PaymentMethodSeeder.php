<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\FormGenerator;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::insert([
            [
                "admin_id" => Admin::first()->id,
                "name" => "Bkash",
                "type" => "bkash",
                "form_generator_id" => FormGenerator::where('uuid', '71df6d63-42f0-4586-826c-f28b80a78d25')->first()->id,
            ],
            [
                "admin_id" => Admin::first()->id,
                "name" => "Nogod",
                "type" => "nogod",
                "form_generator_id" => FormGenerator::where('uuid', '273083d9-dd5c-4120-8fe2-156f1f781b2d')->first()->id,
            ],
            [
                "admin_id" => Admin::first()->id,
                "name" => "Bank",
                "type" => "bank",
                "form_generator_id" => FormGenerator::where('uuid', 'a03952e6-f818-43ef-8946-8578f4b11833')->first()->id,
            ],
        ]);
    }
}
