<?php

use League\Csv\Reader;
use Illuminate\Database\Seeder;

class LegalCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$reader = Reader::createFromPath('./storage/data.csv');
		$header = null;
		foreach ($reader as $index => $row) {

			for ($i=0; $i<count($row); $i++){
				$row[$i] = trim($row[$i]);
			}

			if ($index == 0) {
				$header = $row;
			} else {
				
				if (!$row[0]) { continue; }

		        $legal_case_type = \App\LegalCaseType::firstOrCreate(['name' => $row[0]]);
		        $legal_case_type->save();

		        $contact_type = \App\ContactType::first();

		        $contact = new \App\Contact;
		        $contact->first_name = $row[1];
		        $contact->last_name = $row[2];
		        $contact->home_phone = $row[3];
		        $contact->work_phone = $row[4];
		        $contact->mobile_phone = $row[5];
		        $contact->emergency_phone = $row[6];
		        $contact->address = $row[7];
		        $contact->address_more = $row[8];
		        $contact->city = $row[9];
		        $contact->state = $row[10];
		        $contact->postal_code = $row[11];
		        $contact->email = $row[12];
		        $contact->birth_year = $row[13];
		        $contact->contact_type_id = $contact_type->id;
		        $contact->save();
		        
		        $legal_case_status = \App\LegalCaseStatus::first();

		        $legal_case = \App\LegalCase::firstOrCreate(['external_id' => $row[14]]);
		        $legal_case->defendant = $row[15];
		        $legal_case->calls = $row[16];
		        $legal_case->contact_id = $contact->id;
		        $legal_case->legal_case_type_id = $legal_case_type->id;
		        $legal_case->legal_case_status_id = $legal_case_status->id;
		        $legal_case->save();

		        for ($i=1; $i<count($row); $i++) {
		        	if ($i > 16 && $header[$i]) {
		        		$legal_case_field_name = new \App\LegalCaseFieldName;
		        		$legal_case_field_name->name = $header[$i];
		        		$legal_case_field_name->save();

		        		$legal_case_field = new \App\LegalCaseField;
		        		$legal_case_field->legal_case_id = $legal_case->id;
		        		$legal_case_field->legal_case_field_name_id = $legal_case_field_name->id;
		        		$legal_case_field->value = $row[$i];
		        		$legal_case_field->save();
		        	}
		        }

		        $legal_case_log = \App\LegalCaseLog::firstOrCreate([
		        	'type' => 'info',
		        	'value' => 'This case was added to the system. (Case #'.$legal_case->id.')',
		        	'legal_case_id' => $legal_case->id
		        ]);
		        $legal_case_log->save();

			}
		}
    }
}
