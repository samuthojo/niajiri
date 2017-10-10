<?php

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$test = Test::first();

			Question::updateOrCreate(['test_id' => $test->id], [
					'label' => 'When did tanzania attain its independence',
					'firstChoice' => '2015',
					'secondChoice' => '1999',
					'thirdChoice'  => '1996',
					'fourthChoice' => 'Tanzania is not independent',
					'fifthChoice'  => '1961',
					'correct'     => '1961',
					'weight'      =>  '25',
					'test_id'     => $test->id,
				]);

		});
	}
}
