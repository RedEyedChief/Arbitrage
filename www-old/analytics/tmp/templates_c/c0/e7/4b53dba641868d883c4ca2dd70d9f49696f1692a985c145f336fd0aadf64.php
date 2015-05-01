<?php

/* @CoreHome/getDonateForm.twig */
class __TwigTemplate_c0e74b53dba641868d883c4ca2dd70d9f49696f1692a985c145f336fd0aadf64 extends Twig_Template
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
        $this->env->loadTemplate("@CoreHome/_donate.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "@CoreHome/getDonateForm.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
