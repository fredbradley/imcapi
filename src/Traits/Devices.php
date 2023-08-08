<?php

namespace FredBradley\IMCAPI\Traits;

trait Devices
{
    public function getDevices(): object
    {
        return $this->request(
            'GET',
            'plat/res/device',
            [
                'resPrivilegeFilter' => false,
                'start' => 0,
                'size' => 2000,
                'orderBy' => 'id',
                'desc' => false,
                'total' => false,
                'exact' => false,
            ]
        );
    }
}
