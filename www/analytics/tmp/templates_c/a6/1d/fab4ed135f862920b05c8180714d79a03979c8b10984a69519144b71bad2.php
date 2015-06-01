<?php

/* @CoreHome/_menu.twig */
class __TwigTemplate_a61dfab4ed135f862920b05c8180714d79a03979c8b10984a69519144b71bad2 extends Twig_Template
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
        // line 11
        echo "
";
        // line 26
        echo "
";
        // line 32
        echo "
";
        // line 38
        echo "
<div class=\"Menu--dashboard\">

    <ul class=\"Menu-tabList\">
        ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "menu"));
        foreach ($context['_seq'] as $context["level1"] => $context["level2"]) {
            // line 43
            echo "            <li id=\"";
            if ($this->getAttribute($context["level2"], "_url", array(), "any", true, true)) {
                echo $this->getAttribute($this, "getId", array(0 => $this->getAttribute($context["level2"], "_url", array())), "method");
            }
            echo "\">
                <a ";
            // line 44
            if ($this->getAttribute($context["level2"], "_url", array(), "any", true, true)) {
                echo "href=\"#";
                echo $this->getAttribute($this, "getFirstUrl", array(0 => $this->getAttribute($context["level2"], "_url", array())), "method");
                echo "\"";
            }
            // line 45
            echo "                   onclick=\"return piwikMenu.onItemClick(this);\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["level1"])), "html", null, true);
            echo "</a>
                <ul>

                ";
            // line 48
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["level2"]);
            foreach ($context['_seq'] as $context["name"] => $context["urlParameters"]) {
                // line 49
                echo "                    ";
                if (($this->getAttribute($context["urlParameters"], "_url", array(), "any", true, true) && (!twig_test_iterable($this->getAttribute($context["urlParameters"], "_url", array()))))) {
                    // line 50
                    echo "                        ";
                    echo $this->getAttribute($this, "groupedItem", array(0 => $context["name"], 1 => $this->getAttribute($context["urlParameters"], "_url", array())), "method");
                    echo "
                    ";
                } elseif ((twig_slice($this->env, $context["name"], 0, 1) != "_")) {
                    // line 52
                    echo "                        ";
                    echo $this->getAttribute($this, "submenuItem", array(0 => $context["name"], 1 => $this->getAttribute($context["urlParameters"], "_url", array())), "method");
                    echo "
                    ";
                }
                // line 54
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['urlParameters'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "
                </ul>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['level1'], $context['level2'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        <li id=\"Searchmenu\">
            <span piwik-quick-access></span>
        </li>
    </ul>

</div>
<div class=\"nav_sep\"></div>
";
    }

    // line 1
    public function getsubmenuItem($__name__ = null, $__url__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "url" => $__url__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ((twig_slice($this->env, $this->getContext($context, "name"), 0, 1) != "_")) {
                // line 3
                echo "        <li>
            <a href='#";
                // line 4
                echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getContext($context, "url"))), 1), "html", null, true);
                echo "'
               onclick='return piwikMenu.onItemClick(this);'>
                ";
                // line 6
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "name"))), "html", null, true);
                echo "
            </a>
        </li>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 12
    public function getgroupedItem($__name__ = null, $__group__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "group" => $__group__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 13
            echo "    <li>
        <div piwik-menudropdown show-search=\"true\" menu-title=\"";
            // line 14
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "name"))), "html_attr");
            echo "\">
            ";
            // line 15
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "group"), "getItems", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 16
                echo "                <a class=\"item\"
                   href='#";
                // line 17
                echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($context["item"], "url", array()))), 1), "html", null, true);
                echo "'
                   ";
                // line 18
                if ($this->getAttribute($context["item"], "tooltip", array())) {
                    echo "title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "tooltip", array()), "html_attr");
                    echo "\"";
                }
                // line 19
                echo "                   onclick='return piwikMenu.onItemClick(this);'>
                    ";
                // line 20
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($context["item"], "name", array()))), "html", null, true);
                echo "
                </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "        </div>
    </li>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 27
    public function getgetId($__urlParameters__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "urlParameters" => $__urlParameters__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 28
            if (twig_test_iterable($this->getContext($context, "urlParameters"))) {
                // line 29
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getContext($context, "urlParameters"))), "html", null, true);
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function getgetFirstUrl($__urlParameters__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "urlParameters" => $__urlParameters__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 34
            if (twig_test_iterable($this->getContext($context, "urlParameters"))) {
                // line 35
                echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getContext($context, "urlParameters"))), 1), "html", null, true);
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@CoreHome/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 35,  239 => 34,  228 => 33,  216 => 29,  214 => 28,  203 => 27,  190 => 23,  181 => 20,  178 => 19,  172 => 18,  168 => 17,  165 => 16,  161 => 15,  157 => 14,  154 => 13,  142 => 12,  126 => 6,  121 => 4,  118 => 3,  115 => 2,  103 => 1,  92 => 59,  83 => 55,  77 => 54,  71 => 52,  65 => 50,  62 => 49,  58 => 48,  51 => 45,  45 => 44,  38 => 43,  34 => 42,  28 => 38,  25 => 32,  22 => 26,  19 => 11,);
    }
}
