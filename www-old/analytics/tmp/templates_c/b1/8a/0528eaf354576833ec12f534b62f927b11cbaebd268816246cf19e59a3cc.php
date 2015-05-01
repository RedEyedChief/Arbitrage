<?php

/* @Installation/_integrityDetails.twig */
class __TwigTemplate_b18a0528eaf354576833ec12f534b62f927b11cbaebd268816246cf19e59a3cc extends Twig_Template
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
        if ((!array_key_exists("warningMessages", $context))) {
            // line 2
            echo "    ";
            $context["warningMessages"] = $this->getAttribute($this->getContext($context, "infos"), "integrityErrorMessages", array());
        }
        // line 4
        echo "<div id=\"integrity-results\" title=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckFileIntegrity")), "html", null, true);
        echo "\" style=\"display:none; font-size: 62.5%;\">
    <table>
        ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "warningMessages"));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 7
            echo "            <tr>
                <td>";
            // line 8
            echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </table>
</div>
<script type=\"text/javascript\">
    <!--
    \$(function () {
        \$(\"#integrity-results\").dialog({
            modal: true,
            autoOpen: false,
            width: 600,
            buttons: {
                Ok: function () {
                    \$(this).dialog('close');
                }
            }
        });
    });
    \$('#more-results').click(function () {
        \$('#integrity-results').dialog('open');
    }).hover(function () {
        \$(this).addClass(\"ui-state-hover\");
    },
    function () {
        \$(this).removeClass(\"ui-state-hover\");
    }).mousedown(function () {
        \$(this).addClass(\"ui-state-active\");
    }).mouseup(function () {
        \$(this).removeClass(\"ui-state-active\");
    });
    //-->
</script>
";
    }

    public function getTemplateName()
    {
        return "@Installation/_integrityDetails.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 11,  38 => 8,  35 => 7,  31 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}
