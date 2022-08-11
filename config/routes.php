<?php

use App\Http\Api\Travel;
use App\Http\Site\Documentation;
use Slim\App;

use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    // Docs
    $app->redirect('/', '/docs');
    $app->get('/docs', [Documentation::class, 'index']);

    // Api
    $app->group('/v1', function (RouteCollectorProxy $v1) {
        $v1->group('/travel', function (RouteCollectorProxy $travel) {
            $travel->get('', [Travel::class, 'index']);
            $travel->post('', [Travel::class, 'create']);
            $travel->patch('', [Travel::class, 'update']);
            $travel->delete('', [Travel::class, 'delete']);
        });
    });
};
