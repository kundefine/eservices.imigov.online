<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            "admin_id" => Admin::first()->id,
            "name" => "Domain Service",
            "type" => "domain",
            "form_generator_id" => 1,
        ]);
    }
}
