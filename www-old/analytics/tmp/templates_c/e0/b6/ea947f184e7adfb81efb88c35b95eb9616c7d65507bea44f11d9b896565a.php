<?php

/* @CoreHome\_uiControl.twig */
class __TwigTemplate_e0b6ea947f184e7adfb81efb88c35b95eb9616c7d65507bea44f11d9b896565a extends Twig_Template
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
        echo "<div class=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "cssIdentifier"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "cssClass"), "html", null, true);
        echo "\"
     data-props=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getContext($context, "clientSideProperties")), "html", null, true);
        echo "\"
     data-params=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getContext($context, "clientSideParameters")), "html", null, true);
        echo "\">
     ";
        // line 4
        $this->env->resolveTemplate($context["implView"]->getTemplateFile())->display(array_merge($context, $context["implView"]->getTemplateVars($this->getContext($context, "implOverride"))));
        // line 5
        echo "</div>
<script>\$(document).ready(function () { require('";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "jsNamespace"), "html", null, true);
        echo "').";
        echo twig_escape_filter($this->env, $this->getContext($context, "jsClass"), "html", null, true);
        echo ".initElements(); });</script>";
    }

    public function getTemplateName()
    {
        return "@CoreHome\\_uiControl.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  36 => 5,  34 => 4,  30 => 3,  26 => 2,  19 => 1,);
    }
}
