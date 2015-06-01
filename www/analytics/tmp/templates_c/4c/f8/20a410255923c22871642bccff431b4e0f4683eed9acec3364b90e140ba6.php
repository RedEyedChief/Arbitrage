<?php

/* @CoreHome/_topBarTopMenu.twig */
class __TwigTemplate_4cf820a410255923c22871642bccff431b4e0f4683eed9acec3364b90e140ba6 extends Twig_Template
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
        echo "<div id=\"topRightBar\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "topMenu"));
        foreach ($context['_seq'] as $context["label"] => $context["menu"]) {
            // line 3
            echo "        ";
            if ($this->getAttribute($context["menu"], "_html", array(), "any", true, true)) {
                // line 4
                echo "            ";
                echo $this->getAttribute($context["menu"], "_html", array());
                echo "
        ";
            } elseif ((($this->getAttribute($this->getAttribute($context["menu"], "_url", array()), "module", array()) == $this->getContext($context, "currentModule")) && (twig_test_empty($this->getAttribute($this->getAttribute($context["menu"], "_url", array()), "action", array())) || ($this->getAttribute($this->getAttribute($context["menu"], "_url", array()), "action", array()) == $this->getContext($context, "currentAction"))))) {
                // line 6
                echo "            <span class=\"topBarElem topBarElemActive\"><strong>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["label"])), "html", null, true);
                echo "</strong></span>
        ";
            } else {
                // line 8
                echo "            <span class=\"topBarElem\" ";
                if ($this->getAttribute($context["menu"], "_tooltip", array(), "any", true, true)) {
                    echo "title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "_tooltip", array()), "html", null, true);
                    echo "\"";
                }
                echo ">
                <a id=\"topmenu-";
                // line 9
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($context["menu"], "_url", array()), "module", array())), "html", null, true);
                echo "\" href=\"index.php";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($context["menu"], "_url", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["label"])), "html", null, true);
                echo "</a>
            </span>
        ";
            }
            // line 12
            echo "        |
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
    ";
        // line 15
        ob_start();
        // line 16
        echo "    ";
        if ((!twig_test_empty($this->getContext($context, "userAlias")))) {
            // line 17
            echo "        ";
            echo $this->getContext($context, "userAlias");
            echo "
    ";
        } else {
            // line 19
            echo "        ";
            echo $this->getContext($context, "userLogin");
            echo "
    ";
        }
        // line 21
        echo "    ";
        $context["helloAlias"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 22
        echo "
    ";
        // line 32
        echo "
    <span class=\"topBarElem\">
        <div id=\"userMenu\"
             tooltip=\"";
        // line 35
        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_HelloUser", trim($this->getContext($context, "helloAlias"))))));
        echo "\"
             menu-title=\"";
        // line 36
        echo twig_escape_filter($this->env, trim($this->getContext($context, "helloAlias")), "html", null, true);
        echo "\"
             piwik-menudropdown>

            ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "userMenu"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["lev1UserLabel"] => $context["lev1UserMenu"]) {
            if ((twig_slice($this->env, $context["lev1UserLabel"], 0, 1) != "_")) {
                // line 40
                echo "                ";
                if ((!$this->getAttribute($context["loop"], "first", array()))) {
                    // line 41
                    echo "                    <hr class=\"item separator\"/>
                ";
                }
                // line 43
                echo "
                ";
                // line 44
                if (($this->getAttribute($context["lev1UserMenu"], "_hasSubmenu", array(), "any", true, true) && $this->getAttribute($context["lev1UserMenu"], "_hasSubmenu", array()))) {
                    // line 45
                    echo "                    ";
                    if ($context["lev1UserLabel"]) {
                        // line 46
                        echo "                        <a class=\"item disabled category\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($context["lev1UserLabel"])), "html", null, true);
                        echo "</a>
                    ";
                    }
                    // line 48
                    echo "
                    ";
                    // line 49
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["lev1UserMenu"]);
                    foreach ($context['_seq'] as $context["lev2Label"] => $context["lev2Menu"]) {
                        if ((twig_slice($this->env, $context["lev2Label"], 0, 1) != "_")) {
                            // line 50
                            echo "                        ";
                            echo $this->getAttribute($this, "userMenuItem", array(0 => $context["lev2Label"], 1 => $context["lev2Menu"], 2 => $this->getContext($context, "currentModule"), 3 => $this->getContext($context, "currentAction")), "method");
                            echo "
                    ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['lev2Label'], $context['lev2Menu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 52
                    echo "                ";
                } else {
                    // line 53
                    echo "                    ";
                    echo $this->getAttribute($this, "userMenuItem", array(0 => $context["lev1UserLabel"], 1 => $context["lev1UserMenu"], 2 => $this->getContext($context, "currentModule"), 3 => $this->getContext($context, "currentAction")), "method");
                    echo "
                ";
                }
                // line 55
                echo "
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lev1UserLabel'], $context['lev1UserMenu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "        </div>
    </span>

    | <span class=\"topBarElem\">
        ";
        // line 61
        if (($this->getContext($context, "userLogin") == "anonymous")) {
            // line 62
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, $this->getContext($context, "loginModule"), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 64
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, $this->getContext($context, "loginModule"), "html", null, true);
            echo "&amp;action=logout'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Logout")), "html", null, true);
            echo "</a>
        ";
        }
        // line 66
        echo "    </span>
</div>
";
    }

    // line 23
    public function getuserMenuItem($__label__ = null, $__menu__ = null, $__currentModule__ = null, $__currentAction__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "menu" => $__menu__,
            "currentModule" => $__currentModule__,
            "currentAction" => $__currentAction__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 24
            echo "
        <a class=\"item ";
            // line 25
            if ((($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url", array()), "module", array()) == $this->getContext($context, "currentModule")) && (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url", array()), "action", array())) || ($this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url", array()), "action", array()) == $this->getContext($context, "currentAction"))))) {
                echo "active";
            }
            echo "\"
           href=\"index.php";
            // line 26
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "menu"), "_url", array()))), "html", null, true);
            echo "\"
           id=\"usermenu-";
            // line 27
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "menu"), "_url", array()), "module", array())), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "menu", true), "_url", array(), "any", false, true), "action", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "menu", true), "_url", array(), "any", false, true), "action", array()), "index")) : ("index"))), "html", null, true);
            echo "\"
           ";
            // line 28
            if ($this->getAttribute($this->getContext($context, "menu", true), "_tooltip", array(), "any", true, true)) {
                echo "title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "menu"), "_tooltip", array()), "html", null, true);
                echo "\"";
            }
            // line 29
            echo "                >";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "label"))), "html", null, true);
            echo "</a>

    ";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topBarTopMenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 29,  241 => 28,  235 => 27,  231 => 26,  225 => 25,  222 => 24,  208 => 23,  202 => 66,  194 => 64,  186 => 62,  184 => 61,  178 => 57,  167 => 55,  161 => 53,  158 => 52,  148 => 50,  143 => 49,  140 => 48,  134 => 46,  131 => 45,  129 => 44,  126 => 43,  122 => 41,  119 => 40,  108 => 39,  102 => 36,  98 => 35,  93 => 32,  90 => 22,  87 => 21,  81 => 19,  75 => 17,  72 => 16,  70 => 15,  67 => 14,  60 => 12,  50 => 9,  41 => 8,  35 => 6,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
