<?php

declare(strict_types=1);

namespace App\Controller;

class GeneratorController
{
    public function getPage()
    {
        $test = [
            ['id' => 1, 'username' => 'AquaPelham', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'date' => 'Aug. 20, 2015'],
        ];
        dump(json_encode($test));die;
    }
}