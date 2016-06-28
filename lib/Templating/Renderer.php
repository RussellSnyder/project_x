<?php

class Templating_Renderer {
    private $baseDir;

    function __construct($baseDir) {
        $this->baseDir = $baseDir;
    }

    /**
     * @param Templating_RenderJob $renderJob
     * @return string
     */
    function render(Templating_RenderJob $renderJob) {
        $templateName = ucfirst($renderJob->getTemplateName()) . '.php';
        $path = $this->baseDir . '/' . $templateName;

        ob_start();
        extract($renderJob->getData());
        include($path);
        return ob_get_clean();
    }
}