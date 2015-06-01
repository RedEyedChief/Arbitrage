<?php

/* @CoreHome/_topBar.twig */
class __TwigTemplate_2976c066d9496b3b327a0a7e2aa6ad9246da9f8076f6353589edf8979edaab2a extends Twig_Template
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
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeTopBar", $this->getContext($context, "userAlias"), $this->getContext($context, "userLogin"), $this->getContext($context, "topMenu"), $this->getContext($context, "userMenu")));
        echo "
<div id=\"topBars\">
    ";
        // line 3
        $this->env->loadTemplate("@CoreHome/_topBarTopMenu.twig")->display($context);
        // line 4
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topBar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 4,  24 => 3,  19 => 1,);
    }
}
