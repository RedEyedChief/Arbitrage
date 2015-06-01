<?php

/* @CoreVisualizations/_dataTableViz_jqplotGraph.twig */
class __TwigTemplate_4c547a59273b943e686c8bc677603d7b471849ad2bc9db19d4f7ebb75bce13bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"jqplot-graph\">
    <div class=\"piwik-graph\" data-data=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getContext($context, "visualization"), "getGraphData", array(0 => $this->getContext($context, "dataTable"), 1 => $this->getContext($context, "properties")), "method")), "html", null, true);
        echo "\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_jqplotGraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
