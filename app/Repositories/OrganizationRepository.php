<?php

namespace App\Repositories;

use App\Models\Organization;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrganizationRepository
 * @package App\Repositories
 * @version October 5, 2017, 7:49 pm UTC
 *
 * @method Organization findWithoutFail($id, $columns = ['*'])
 * @method Organization find($id, $columns = ['*'])
 * @method Organization first($columns = ['*'])
*/
class OrganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'logo',
        'sector_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }
}
