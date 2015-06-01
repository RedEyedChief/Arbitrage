<?php

/* ajaxMacros.twig */
class __TwigTemplate_cc844bf1fbeb859680f910fe7433b9dbaddbb58dc5776b10d8c158983c6147ee extends Twig_Template
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
        // line 4
        echo "
";
        // line 15
        echo "
";
    }

    // line 1
    public function geterrorDiv($__id__ = "ajaxError")
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" style=\"display:none\"></div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getloadingDiv($__id__ = "ajaxLoadingDiv")
    {
        $context = $this->env->mergeGlobals(array(
            "id" => $__id__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            echo "<div id=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
            echo "\" style=\"display:none;\">
    <div class=\"loadingPiwik\">
        <img src=\"plugins/Morpheus/images/loading-blue.gif\" alt=\"";
            // line 8
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "\" />";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "
    </div>
    <div class=\"loadingSegment\">
        ";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_LoadingSegmentedDataMayTakeSomeTime")), "html", null, true);
            echo "
    </div>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 16
    public function getrequestErrorDiv($__emailSuperUser__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "emailSuperUser" => $__emailSuperUser__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 17
            echo "    ";
            if ((array_key_exists("emailSuperUser", $context) && $this->getContext($context, "emailSuperUser"))) {
                // line 18
                echo "        <div id=\"loadingError\">";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ErrorRequest", (("<a href=\"mailto:" . $this->getContext($context, "emailSuperUser")) . "\">"), "</a>"));
                echo "</div>
    ";
            } else {
                // line 20
                echo "        <div id=\"loadingError\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ErrorRequest", "", "")), "html", null, true);
                echo "</div>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "ajaxMacros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 20,  106 => 18,  103 => 17,  92 => 16,  77 => 11,  69 => 8,  63 => 6,  52 => 5,  38 => 2,  27 => 1,  22 => 15,  19 => 4,);
    }
}
