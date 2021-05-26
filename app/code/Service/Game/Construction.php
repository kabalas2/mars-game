<?php

namespace Service\Game;

use Core\Session;
use Model\Building;
use Session\Message;
use Service\Game\Resource;

class Construction
{

    private $costs;

    public function build($level, $position, $buildTypeId, $cityId)
    {
        $message = new Message();
        if ($this->checkResourcesBalance($buildTypeId)) {

            $building = new Building();
            $building->setLevel($level);
            $building->setCityId($cityId);
            $building->setPosition($position);
            $building->setBuildinTypeId($buildTypeId);

            $message->setErrorMessage('Constructions started');
            $building->save();


        } else {
            $message->setErrorMessage('Not Enought resources!');
        }
    }

    public function checkResourcesBalance($buildTypeId)
    {
        $resource = new Resource();
        $this->setCosts();
        $userResources = $resource->getUserResources();
        $biuldingCost = $this->costs[$buildTypeId];
        foreach ($biuldingCost as $name => $value){
            if($userResources[$name] < $value){
                return false;
            }
        }

        return true;
    }

    public function setCosts()
    {
        $this->costs = [
            1 => [
                'sand' => 100,
                'clay' => 200,
                'metal' => 150,
                'energy' => 50
            ],
            2 => [
                'clay' => 20,
                'energy' => 50,
                'water' => 200
            ],
            3 => [
                'clay' => 200,
                'energy' => 20,
                'metal' => 200
            ],
            4 => [
                'clay' => 200,
                'energy' => 20,
                'metal' => 200
            ],
            5 => [
                'clay' => 200,
                'energy' => 10,
                'metal' => 200
            ],
            6 => [
                'clay' => 200,
                'energy' => 20,
                'metal' => 200
            ],
            7 => [
                'clay' => 200,
                'energy' => 20,
                'metal' => 200
            ],
            8 => [
                'clay' => 200,
                'energy' => 200,
                'metal' => 200
            ],
            9 => [
                'clay' => 10,
                'energy' => 20,
                'metal' => 2000
            ]
        ];
    }
}