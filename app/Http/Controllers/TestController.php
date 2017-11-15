<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Repositories\TestRepository;
use App\Repositories\QuestionRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TestController extends SecureController
{
    /** @var  TestRepository */
    private $testRepository;
    private $questionRepository;

    public function __construct(TestRepository $testRepo, QuestionRepository $questionRepo)
    {
        $this->testRepository = $testRepo;
        $this->questionRepository = $questionRepo;
    }

    /**
     * Display a listing of the Test.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->testRepository->pushCriteria(new RequestCriteria($request));
        $tests = $this->testRepository->paginate(config('app.defaults.pageSize'));

        return view('pages.tests.index',[
            'route_title' => 'Tests',
            'route_description' => 'Tests',
            'tests' => $tests
        ]);
    }

    /**
     * Show the form for creating a new Test.
     *
     * @return Response
     */
    public function create()
    {
      return view('pages.tests.create',[
          'route_title' => 'Tests',
          'route_description' => 'Tests'
      ]);
    }

    /**
     * Store a newly created Test in storage.
     *
     * @param CreateTestRequest $request
     *
     * @return Response
     */
    public function store($id = null,CreateTestRequest $request)
    {
        $input = $request->all();

        $test = $this->testRepository->create($input);

        Flash::success('Test saved successfully.');


        if (!empty($test->stage_id)) {

          return redirect(route('stages.show',['id' => $test->stage_id]));

        }


        return redirect(route('tests.index'));
    }

    /**
     * Display the specified Test.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        return view('pages.tests.show',[
            'route_title' => 'Tests',
            'route_description' => 'Tests',
            'test' => $test
        ]);
    }

    /**
     * Show the form for editing the specified Test.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        return view('pages.tests.edit',[
            'route_title' => 'Tests',
            'route_description' => 'Tests',
            'test' => $test
        ]);
    }

    /**
     * Update the specified Test in storage.
     *
     * @param  int              $id
     * @param UpdateTestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestRequest $request)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        $test = $this->testRepository->update($request->all(), $id);

        Flash::success('Test updated successfully.');

        if (!empty($test->stage_id)) {

          return redirect(route('stages.show',['id' => $test->stage_id]));

        }

        return redirect(route('tests.index'));
    }

    /**
     * Remove the specified Test from storage.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function destroy($id)
    {
        $test = $this->testRepository->findWithoutFail($id);

        if (empty($test)) {
            Flash::error('Test not found');

            return redirect(route('tests.index'));
        }

        $this->testRepository->delete($id);

        Flash::success('Test deleted successfully.');

        if (!empty($test->stage_id)) {

          return redirect(route('stages.show',['id' => $test->stage_id]));

        }

        return redirect(route('tests.index'));
    }



    /**
     * Show the form for creating a new Question and attach to test.
     *
     * @return Response
     */
    public function QuestionCreate($id)
    {
      $test = $this->testRepository->findWithoutFail($id);

      return view('pages.tests.questions.create',[
          'route_title' => 'Question Create',
          'route_description' => 'Question',
          'test'  => $test,
      ]);
    }



    /**
     * Store a newly created Test  and attach to Stage in storage.
     *
     * @param CreateTestRequest $request
     *
     * @return Response
     */
    public function QuestionStore($id, Request $request)
    {
        $input = $request->all();
        $input['stage_id'] = $id;

        $question = $this->questionRepository->create($input);

        Flash::success('Stage Test saved successfully.');

        return redirect(route('tests.show',['id' => $question->test_id]));

    }
}
