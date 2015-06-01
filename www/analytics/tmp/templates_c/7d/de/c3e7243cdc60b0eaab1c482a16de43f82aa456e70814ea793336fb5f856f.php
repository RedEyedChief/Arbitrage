<?php

/* @Installation/layout.twig */
class __TwigTemplate_7ddec3e7243cdc60b0eaab1c482a16de43f82aa456e70814ea793336fb5f856f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class=\"old-ie\" id=\"ng-app\" ng-app=\"piwikApp\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html id=\"ng-app\" ng-app=\"piwikApp\"><!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <title>Piwik &rsaquo; ";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Installation")), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"libs/jquery/themes/base/jquery-ui.min.css\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getBaseCss\"/>
    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
    <script type=\"text/javascript\" src=\"libs/bower_components/jquery/dist/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/jquery-ui/ui/minified/jquery-ui.min.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/angular/angular.min.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/angular-sanitize/angular-sanitize.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/angular-animate/angular-animate.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/angular-cookies/angular-cookies.js\"></script>
    <script type=\"text/javascript\" src=\"libs/bower_components/ngDialog/js/ngDialog.min.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/common/services/service.module.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/common/filters/filter.module.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/common/filters/translate.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/common/directives/directive.module.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/common/directives/focus-anywhere-but-here.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/piwikApp.config.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/CoreHome/angularjs/piwikApp.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/Installation/javascripts/installation.js\"></script>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Installation/stylesheets/installation.css\"/>
    ";
        // line 29
        if ((call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LayoutDirection")) == "rtl")) {
            // line 30
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Morpheus/stylesheets/rtl.css\"/>
    ";
        }
        // line 32
        echo "</head>
<body ng-app=\"app\">
<div id=\"installationPage\">
    <div id=\"content\">
        <div id=\"logo\">
            <img id=\"title\" src=\"plugins/Morpheus/images/logo.png\"/> &nbsp;&nbsp;&nbsp;<span
                    id=\"subtitle\"># ";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "</span>
        </div>
        <div style=\"float:right;\" id=\"topRightBar\">
            <br/>
            ";
        // line 42
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.topBar"));
        echo "
        </div>
        <div class=\"both\"></div>

        <div id=\"generalInstall\">
            ";
        // line 47
        $this->env->loadTemplate("@Installation/_allSteps.twig")->display($context);
        // line 48
        echo "        </div>

        <div id=\"detailInstall\">
            ";
        // line 51
        ob_start();
        // line 52
        echo "            <p class=\"nextStep\">
                <a class=\"submit\" href=\"";
        // line 53
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => $this->getContext($context, "nextModuleName"), "token_auth" => null, "method" => null))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
        echo " &raquo;</a>
            </p>
            ";
        $context["nextButton"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 56
        echo "            ";
        if ((array_key_exists("showNextStepAtTop", $context) && $this->getContext($context, "showNextStepAtTop"))) {
            // line 57
            echo "                ";
            echo twig_escape_filter($this->env, $this->getContext($context, "nextButton"), "html", null, true);
            echo "
            ";
        }
        // line 59
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 60
        echo "            ";
        if ($this->getContext($context, "showNextStep")) {
            // line 61
            echo "                ";
            echo twig_escape_filter($this->env, $this->getContext($context, "nextButton"), "html", null, true);
            echo "
            ";
        }
        // line 63
        echo "        </div>

        <div class=\"both\"></div>

        <br/>
        <br/>

        <h3>";
        // line 70
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_InstallationStatus")), "html", null, true);
        echo "</h3>

        <div id=\"progressbar\" data-progress=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, "percentDone"), "html", null, true);
        echo "\"></div>
        ";
        // line 73
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_PercentDone", $this->getContext($context, "percentDone"))), "html", null, true);
        echo "
    </div>
</div>
</body>
</html>
";
    }

    // line 59
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@Installation/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 59,  141 => 73,  137 => 72,  132 => 70,  123 => 63,  117 => 61,  114 => 60,  111 => 59,  105 => 57,  102 => 56,  94 => 53,  91 => 52,  89 => 51,  84 => 48,  82 => 47,  74 => 42,  67 => 38,  59 => 32,  55 => 30,  53 => 29,  29 => 8,  20 => 1,);
    }
}
