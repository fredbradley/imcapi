<?php

declare(strict_types=1);

test('loads class', function () {
    $client = Mockery::mock(\FredBradley\IMCAPI\Imcapi::class);
    $api = new \FredBradley\IMCAPI\Imcapi(
        'string', 'str', 'pass'
    );
    expect($api)->toBeInstanceOf(\FredBradley\IMCAPI\Imcapi::class);
});
test('gets devices', function () {
    $client = Mockery::mock(\FredBradley\IMCAPI\Imcapi::class)->makePartial();
    $client->shouldReceive('request')->once()->andReturn((object) [
        'error' => 'hello',
        'status_code' => 500,
    ]);
    $client->getDevices();
});
test('generates exception', function () {
    $client = Mockery::mock(\FredBradley\IMCAPI\Imcapi::class)->makePartial();
    $client->shouldReceive('request')->once()
        //->andReturn((object)[])
        ->andThrowExceptions([new \Exception('hello', 500)]);
    $client->request('GET', 'plat/res/device');

})->expectException(\Exception::class);
