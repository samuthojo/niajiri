<?php

namespace App\Repositories;

use App\Models\Organization;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrganizationRepository
 * @package App\Repositories
 * @version October 7, 2017, 5:47 am UTC
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
        'name',
        'email',
        'mobile',
        'landline',
        'fax',
        'physical_address',
        'postal_address',
        'website',
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
