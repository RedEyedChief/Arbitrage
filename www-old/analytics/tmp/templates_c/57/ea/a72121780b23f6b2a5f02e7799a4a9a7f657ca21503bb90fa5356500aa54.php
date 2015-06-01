<?php

/* @Installation/_allSteps.twig */
class __TwigTemplate_57eaa72121780b23f6b2a5f02e7799a4a9a7f657ca21503bb90fa5356500aa54 extends Twig_Template
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
        echo "<ul>
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "allStepsTitle"));
        foreach ($context['_seq'] as $context["stepId"] => $context["stepName"]) {
            // line 3
            echo "        ";
            if (($this->getContext($context, "currentStepId") > $context["stepId"])) {
                // line 4
                echo "            <li class=\"pastStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["stepName"])), "html", null, true);
                echo "</li>
        ";
            } elseif (($this->getContext($context, "currentStepId") == $context["stepId"])) {
                // line 6
                echo "            <li class=\"actualStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["stepName"])), "html", null, true);
                echo "</li>
        ";
            } else {
                // line 8
                echo "            <li class=\"futureStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["stepName"])), "html", null, true);
                echo "</li>
        ";
            }
            // line 10
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['stepId'], $context['stepName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "@Installation/_allSteps.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  47 => 10,  41 => 8,  35 => 6,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
