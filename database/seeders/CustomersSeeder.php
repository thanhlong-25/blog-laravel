<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //UserCustomer::truncate(); // xoá database đang có
        for($i = 0; $i < 10; $i++){
        Customer::create([
            'customer_name' => $faker->name,
            'customer_email' => $faker->unique()->safeEmail,
            'customer_phone' => $faker->PhoneNumber,
            'customer_password' => md5($faker->password), // password
        ]);}
    }
}
