<?php

namespace App\Repositories;

use App\Models\Question;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QuestionRepository
 * @package App\Repositories
 * @version October 9, 2017, 5:00 pm UTC
 *
 * @method Question findWithoutFail($id, $columns = ['*'])
 * @method Question find($id, $columns = ['*'])
 * @method Question first($columns = ['*'])
*/
class QuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'label',
        'firstChoice',
        'secondChoice',
        'thirdChoice',
        'fourthChoice',
        'fifthChoice',
        'correct',
        'weight',
        'test_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Question::class;
    }
}
