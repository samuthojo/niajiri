<?php

namespace App\Repositories;

use App\Models\Sector;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SectorRepository
 * @package App\Repositories
 * @version October 5, 2017, 7:45 pm UTC
 *
 * @method Sector findWithoutFail($id, $columns = ['*'])
 * @method Sector find($id, $columns = ['*'])
 * @method Sector first($columns = ['*'])
*/
class SectorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sector::class;
    }
}
