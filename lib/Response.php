<?php

class Response {
    /* @ar Templating_Renderer */
    private $renderer;

    /* @var Templating_RenderJob */
    private $renderJob = null;

    function __construct(Templating_Renderer $renderer) {
        $this->renderer = $renderer;
    }

    function setRenderJob(Templating_RenderJob $renderJob) {
        $this->renderJob = $renderJob;
    }

    function output() {
        return $this->renderer->render($this->renderJob);
    }
}