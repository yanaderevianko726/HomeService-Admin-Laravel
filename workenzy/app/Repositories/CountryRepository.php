<?php
namespace App\Repositories;

use App\Models\Country;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 * @version January 13, 2021, 10:56 am UTC
 *
 * @method CountryRepository findWithoutFail($id, $columns = ['*'])
 * @method CountryRepository find($id, $columns = ['*'])
 * @method CountryRepository first($columns = ['*'])
 */
class CountryRepository extends BaseRepository
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
        return Country::class;
    }
}
