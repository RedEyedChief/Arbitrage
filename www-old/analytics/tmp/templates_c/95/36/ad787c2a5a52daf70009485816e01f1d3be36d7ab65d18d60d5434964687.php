<?php

/* @Dashboard/_widgetFactoryTemplate.twig */
class __TwigTemplate_9536ad787c2a5a52daf70009485816e01f1d3be36d7ab65d18d60d5434964687 extends Twig_Template
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
        echo "<div id=\"widgetTemplate\" style=\"display:none;\">
  <div class=\"widget\">
    <div class=\"widgetTop\">
      <div class=\"button\" id=\"close\">
        <img src=\"plugins/Morpheus/images/close.png\" title=\"";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html", null, true);
        echo "\" />
      </div>
      <div class=\"button\" id=\"maximise\">
        <img src=\"plugins/Morpheus/images/maximise.png\" title=\"";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_Maximise")), "html", null, true);
        echo "\" />
      </div>
      <div class=\"button\" id=\"minimise\">
        <img src=\"plugins/Morpheus/images/minimise.png\" title=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_Minimise")), "html", null, true);
        echo "\" />
      </div>
      <div class=\"button\" id=\"refresh\">
        <img src=\"plugins/Morpheus/images/refresh.png\" title=\"";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Refresh")), "html", null, true);
        echo "\" />
      </div>
      <div class=\"widgetName\">";
        // line 16
        if (array_key_exists("widgetName", $context)) {
            echo twig_escape_filter($this->env, $this->getContext($context, "widgetName"), "html", null, true);
        }
        echo "</div>
    </div>
    <div class=\"widgetContent\">
      <div class=\"widgetLoading\">";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_LoadingWidget")), "html", null, true);
        echo "</div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Dashboard/_widgetFactoryTemplate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 19,  48 => 16,  43 => 14,  37 => 11,  31 => 8,  25 => 5,  19 => 1,);
    }
}
