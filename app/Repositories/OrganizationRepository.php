<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrganizationRepository
 * @package App\Repositories
 * @version October 7, 2017, 5:47 am UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
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
     * @override
     */
    public function findWithoutFail($id, $columns = ['*'])
    {
        try {
            return $this->find($id, $columns)->where('type', User::TYPE_ORGANIZATION);
        } catch (Exception $e) {
            return;
        }
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
