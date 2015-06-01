<?php

/* @CoreHome/_siteSelectHeader.twig */
class __TwigTemplate_cd41ba01c8facbeeb618a37d4ca6b7a89d6d53961c5cc67f83e51c7110779287 extends Twig_Template
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
        echo "<div class=\"top_bar_sites_selector ";
        if (($this->getContext($context, "currentModule") == "CoreHome")) {
            echo "sites_selector_in_dashboard";
        }
        echo "\">
    <label>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</label>
    <div piwik-siteselector class=\"sites_autocomplete\"></div>

</div>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_siteSelectHeader.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  19 => 1,);
    }
}
