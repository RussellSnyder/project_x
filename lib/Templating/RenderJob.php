<?php

class Templating_RenderJob {
    private $templateName = null;
    private $data = null;

    function __construct($templateName, $data) {
        $this->templateName = $templateName;
        $this->data = $data;
    }

    /**
     * @param null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $templateName
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    /**
     * @return null
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

}