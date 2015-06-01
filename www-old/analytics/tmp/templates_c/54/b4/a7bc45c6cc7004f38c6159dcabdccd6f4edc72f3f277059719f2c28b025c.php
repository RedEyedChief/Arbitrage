<?php

/* @CoreHome/_indexContent.twig */
class __TwigTemplate_54b4a7bc45c6cc7004f38c6159dcabdccd6f4edc72f3f277059719f2c28b025c extends Twig_Template
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
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 2
        echo "<div class=\"pageWrap\">
    ";
        // line 3
        $this->env->loadTemplate("@CoreHome/_notifications.twig")->display($context);
        // line 4
        echo "    <div class=\"top_controls\">
        ";
        // line 5
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 6
        echo "        ";
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.nextToCalendar"));
        echo "
        ";
        // line 7
        $this->env->resolveTemplate($context["dashboardSettingsControl"]->getTemplateFile())->display(array_merge($context, $context["dashboardSettingsControl"]->getTemplateVars()));
        // line 8
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_headerMessage.twig")->display($context);
        // line 9
        echo "        ";
        echo $context["ajax"]->getrequestErrorDiv(((array_key_exists("emailSuperUser", $context)) ? (_twig_default_filter($this->getContext($context, "emailSuperUser"), "")) : ("")));
        echo "
    </div>

    ";
        // line 12
        echo $context["ajax"]->getloadingDiv();
        echo "

    <div id=\"content\" class=\"home\">
        ";
        // line 15
        if ($this->getContext($context, "content")) {
            echo twig_escape_filter($this->env, $this->getContext($context, "content"), "html", null, true);
        }
        // line 16
        echo "    </div>
    <div class=\"clear\"></div>
</div>

<br/><br/>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_indexContent.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 16,  54 => 15,  48 => 12,  41 => 9,  38 => 8,  36 => 7,  31 => 6,  29 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
