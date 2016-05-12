<?php

use Illuminate\Database\Seeder;

class ContactTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Plaintiff', 'Attorney', 'Employee'];

        foreach ($items as $item) {
	        $contact_type = \App\ContactType::firstOrCreate(['name' => $item]);
	        $contact_type->save();
        }
    }
}
