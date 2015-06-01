<?php

/* @Installation/finished.twig */
class __TwigTemplate_d56535e32ca177dabb85cdc88d9d33c11465953491f9e57a24e48a21dcccae34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<h2>";
        // line 5
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Congratulations"));
        echo "</h2>
";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_CongratulationsHelp"));
        echo "
<br/>

<h2>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WelcomeToCommunity")), "html", null, true);
        echo "</h2>
<p>
    ";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_CollaborativeProject")), "html", null, true);
        echo "
</p>
<p>
    ";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_GetInvolved", "<a  target=\"_blank\" href=\"http://piwik.org/get-involved/\">", "</a>"));
        echo "
    ";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_HelpTranslatePiwik", "<a target='_blank' href='http://piwik.org/translations/'>", "</a>"));
        echo "
</p>
<p>";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WeHopeYouWillEnjoyPiwik")), "html", null, true);
        echo "</p>
<p><i>";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_HappyAnalysing")), "html", null, true);
        echo "</i></p>
<br/>

<h2>";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_DefaultSettings")), "html", null, true);
        echo "</h2>
<p>";
        // line 22
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_DefaultSettingsHelp")), "html", null, true);
        echo "</p>
";
        // line 23
        if (array_key_exists("errorMessage", $context)) {
            // line 24
            echo "    <div class=\"error\">
        <img src=\"plugins/Morpheus/images/error_medium.png\"/>
        ";
            // line 26
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Error")), "html", null, true);
            echo ":
        <br/>- ";
            // line 27
            echo $this->getContext($context, "errorMessage");
            echo "
    </div>
";
        }
        // line 30
        if (array_key_exists("form_data", $context)) {
            // line 31
            echo "    ";
            $this->env->loadTemplate("genericForm.twig")->display($context);
        }
        // line 33
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Installation/finished.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 33,  100 => 31,  98 => 30,  92 => 27,  88 => 26,  84 => 24,  82 => 23,  78 => 22,  74 => 21,  68 => 18,  64 => 17,  59 => 15,  55 => 14,  49 => 11,  44 => 9,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
