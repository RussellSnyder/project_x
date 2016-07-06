<?php

class Routes_404 extends Routing_Route {


    function handle(Request $request, Response $response) {
        $renderJob = new Templating_RenderJob('404', [

        ]);
        
        $response->setRenderJob($renderJob);
    }
}