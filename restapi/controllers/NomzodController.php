<?php


namespace restapi\controllers;

use restapi\resources\NomzodResource;

/**
 * Class NomzodController
 *
 * @package restapi\controllers
 * @author Bobur Usmonkulov <usmonkulov5@mail.com>
 */
class NomzodController extends BehaviorsController
{
    public $modelClass = NomzodResource::class;
}