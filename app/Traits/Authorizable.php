<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait Authorizable
{
    private $abilities = [
        'index' => 'view',
        'edit' => 'edit',
        'show' => 'view',
        'update' => 'edit',
        'create' => 'add',
        'store' => 'add',
        'destroy' => 'delete'
    ];

    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    // callAction method which gets called by the router to trigger respective method on the resource controlle

    public function callAction($method, $parameters)
    {
        if( $ability = $this->getAbility($method) ) {
            $this->authorize($ability);
        }

        return parent::callAction($method, $parameters);
    }

    public function getAbility($method)
    {
        $routeName = explode('.', \Request::route()->getName());
        $action = Arr::get($this->getAbilities(), $method);
        return $action ? $action . '_' . $routeName[0] : null;
    }


    private function getAbilities()
    {
        return $this->abilities;
    }


    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }
}