<?php

namespace App\Repositories;

use App\Models\Project;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version October 5, 2017, 7:51 pm UTC
 *
 * @method Project findWithoutFail($id, $columns = ['*'])
 * @method Project find($id, $columns = ['*'])
 * @method Project first($columns = ['*'])
*/
class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'startedAt',
        'endedAt',
        'organization_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
