<?php

class Bootstrap {
    static function initiate($baseTemplate) {
        $db = new Db('data.sqlite3');

        $renderer = new Templating_Renderer(getcwd() . '/Templates');
        $route = Routing_Router::loadRoute($_SERVER, $db);

        $request = new Request();
        $response = new Response($renderer);

        $route->handle($request, $response);

        echo $renderer->render(new Templating_RenderJob($baseTemplate, [
            'routeOutput' => $response->output()
        ]));
    }
}