<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SecureController;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Repositories\QuestionRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class QuestionController extends SecureController {
	/** @var  QuestionRepository */
	private $questionRepository;

	public function __construct(QuestionRepository $questionRepo) {
		$this->questionRepository = $questionRepo;
	}

	/**
	 * Display a listing of the Question.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request) {
		$this->questionRepository->pushCriteria(new RequestCriteria($request));
		$questions = $this->questionRepository->all()->paginate(config('app.defaults.pageSize'));

		return view('pages.questions.index', [
			'route_title' => 'Questions',
			'route_description' => 'Questions',
			'questions' => $questions,
			'instance' => $questions,
		]);
	}

	/**
	 * Show the form for creating a new Question.
	 *
	 * @return Response
	 */
	public function create() {
		return view('pages.questions.create', [
			'route_title' => 'Questions',
			'route_description' => 'Questions',
		]);
	}

	/**
	 * Store a newly created Question in storage.
	 *
	 * @param CreateQuestionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateQuestionRequest $request) {
		$input = $request->all();

		$question = $this->questionRepository->create($input);

		//upload & store question attachment
		if ($question && $request->hasFile('attachment')) {
			//clear existing attachment
			$question->clearMediaCollection('attachments');
			//attach new attachment
			$question->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		Flash::success('Question saved successfully.');

		return redirect()->route('tests.show', [
			'id' => $question->test_id,
			'position_id' => $request->input('position_id'),
			'stage_id' => $request->input('stage_id'),
		]);
	}

	/**
	 * Display the specified Question.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$question = $this->questionRepository->findWithoutFail($id);

		if (empty($question)) {
			Flash::error('Question not found');

			return redirect(route('questions.index'));
		}

		return view('pages.questions.show', [
			'route_title' => 'Questions',
			'route_description' => 'Questions',
			'question' => $question,
			'instance' => $question,
		]);
	}

	/**
	 * Show the form for editing the specified Question.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$question = $this->questionRepository->findWithoutFail($id);

		if (empty($question)) {
			Flash::error('Question not found');

			return redirect(route('questions.index'));
		}

		return view('pages.questions.edit', [
			'route_title' => 'Questions',
			'route_description' => 'Questions',
			'question' => $question,
			'instance' => $question,
		]);
	}

	/**
	 * Update the specified Question in storage.
	 *
	 * @param  int              $id
	 * @param UpdateQuestionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateQuestionRequest $request) {
		$question = $this->questionRepository->findWithoutFail($id);

		if (empty($question)) {
			Flash::error('Question not found');

			return redirect(route('questions.index'));
		}

		//update if not attempts
		if ($question->attempts->count() === 0) {
			$question = $this->questionRepository->update($request->all(), $id);
		}

		//upload & store question attachment
		if ($question && $request->hasFile('attachment')) {
			//clear existing attachment
			$question->clearMediaCollection('attachments');
			//attach new attachment
			$question->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		Flash::success('Question updated successfully.');

		if (!empty($question->test_id)) {

			return redirect(route('tests.show', ['id' => $question->test_id]));

		}

		return redirect(route('questions.index'));
	}

	/**
	 * Remove the specified Question from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$question = $this->questionRepository->findWithoutFail($id);

		if (empty($question)) {
			Flash::error('Question not found');

			return redirect(route('questions.index'));
		}

		$this->questionRepository->delete($id);

		Flash::success('Question deleted successfully.');

		if (!empty($question->test_id)) {

			return redirect(route('tests.show', ['id' => $question->test_id]));

		}
		return redirect(route('questions.index'));
	}
}
