<?php

namespace App\Repositories;

use App\Models\Stage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StageRepository
 * @package App\Repositories
 * @version October 9, 2017, 4:58 pm UTC
 *
 * @method Stage findWithoutFail($id, $columns = ['*'])
 * @method Stage find($id, $columns = ['*'])
 * @method Stage first($columns = ['*'])
*/
class StageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'activities',
        'number',
        'startedAt',
        'endedAt',
        'passMark',
        'position_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Stage::class;
    }
}
