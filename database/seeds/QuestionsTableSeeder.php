<?php

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder {
	public function run() {
		DB::transaction(function () {

			$tests = Test::all();

			$sampleQuestions = [
				[
					'label' => 'Two ships are sailing in the sea on the two sides of a lighthouse. The angle of elevation of the top of the lighthouse is observed from the ships are 30° and 45° respectively. If the lighthouse is 100 m high, the distance between the two ships is:',
					'firstChoice' => '173 m',
					'secondChoice' => '200 m',
					'thirdChoice' => '273 m',
					'fourthChoice' => '300 m',
					'fifthChoice' => '450 m',
					'correct' => '273 m',
					'weight' => '25',
				],
				[
					'label' => 'The angle of elevation of a ladder leaning against a wall is 60º and the foot of the ladder is 4.6 m away from the wall. The length of the ladder is:',
					'firstChoice' => '2.3',
					'secondChoice' => '4.6',
					'thirdChoice' => '7.8',
					'fourthChoice' => '1.1',
					'fifthChoice' => '9.2',
					'correct' => '9.2',
					'weight' => '25',
				],
				[
					'label' => 'The ratio between the length and the breadth of a rectangular park is 3 : 2. If a man cycling along the boundary of the park at the speed of 12 km/hr completes one round in 8 minutes, then the area of the park (in sq. m) is:',
					'firstChoice' => '15360',
					'secondChoice' => '153600',
					'thirdChoice' => '30720',
					'fourthChoice' => '307200',
					'fifthChoice' => 'No answer',
					'correct' => '153600',
					'weight' => '25',
				],
				[
					'label' => 'An error 2% in excess is made while measuring the side of a square. The percentage of error in the calculated area of the square is:',
					'firstChoice' => '2%',
					'secondChoice' => '2.02%',
					'thirdChoice' => '4%',
					'fourthChoice' => '4.04%',
					'fifthChoice' => 'No Answer',
					'correct' => '4.04%',
					'weight' => '25',
				],
			];

			foreach ($tests as $test) {
				foreach ($sampleQuestions as $question) {
					$question['test_id'] = $test->id;
					Question::updateOrCreate([
						'test_id' => $question['test_id'],
						'label' => $question['label'],
					], $question);
				}
			}

		});
	}
}
