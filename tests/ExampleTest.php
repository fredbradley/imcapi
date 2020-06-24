<?php

namespace Fredbradley\Imcapi\Tests;

use FredBradley\IMCAPI\Imcapi;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function can_load_api()
    {
        $api = new Imcapi("", "", "");
        $return = json_encode($api->request("test"));
        $this->assertJson($return);
    }
}
