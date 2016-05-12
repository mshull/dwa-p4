<?php

use Illuminate\Database\Seeder;

class LegalCaseStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Pre Correspondence', 'Demand Letter Sent', 'Lawsuit on file', 'Under negotiation', 'Resolved'];

        foreach ($items as $item) {
	        $case_status = \App\LegalCaseStatus::firstOrCreate(['name' => $item]);
	        $case_status->save();
        }
    }
}
