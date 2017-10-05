<?php

namespace App\Repositories;

use App\Models\Position;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PositionRepository
 * @package App\Repositories
 * @version October 5, 2017, 7:51 pm UTC
 *
 * @method Position findWithoutFail($id, $columns = ['*'])
 * @method Position find($id, $columns = ['*'])
 * @method Position first($columns = ['*'])
*/
class PositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'summary',
        'responsibilities',
        'requirements',
        'duration',
        'dueAt',
        'publishedAt',
        'project_id',
        'organization_id',
        'sector_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Position::class;
    }
}
