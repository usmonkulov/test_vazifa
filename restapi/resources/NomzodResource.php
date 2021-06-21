<?php


namespace restapi\resources;

use common\models\Nomzod;

/**
 * Class NomzodResource
 *
 * @package restapi\resources
 * @author Bobur Usmonkulov <usmonkulov5@mail.com>
 */
class NomzodResource extends Nomzod
{
    public function fields()
    {
        return [
            'id',
            'name',
            'family_name',
            'address',
            'country_of_origin',
            'email_adress',
            'phone_number',
            'age',
            'hired',
            'status',
            'created_at',
            'updated_at'
        ];
    }
}