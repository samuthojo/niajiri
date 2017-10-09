<?php

namespace App\Repositories;

use App\Models\Test;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TestRepository
 * @package App\Repositories
 * @version October 9, 2017, 4:59 pm UTC
 *
 * @method Test findWithoutFail($id, $columns = ['*'])
 * @method Test find($id, $columns = ['*'])
 * @method Test first($columns = ['*'])
*/
class TestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'duration',
        'stage_id',
        'test_category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Test::class;
    }
}
