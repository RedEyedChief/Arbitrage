<?php

/* @Live/getLastVisitsStart.twig */
class __TwigTemplate_57736153f1ca5d6cf5af7153d68d799c92b33d03d04b869a3d832ed4cbc5b4cd extends Twig_Template
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
        // line 2
        $context["maxPagesDisplayedByVisitor"] = 100;
        // line 3
        echo "
<ul id='visitsLive'>
    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "visitors"));
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 6
            echo "        <li id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "idVisit", array()), "html", null, true);
            echo "\" class=\"visit\">
            <div style=\"display:none;\" class=\"idvisit\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "idVisit", array()), "html", null, true);
            echo "</div>
            <div title=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["visitor"], "actionDetails", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
            echo "\" class=\"datetime\">
                <span style=\"display:none;\" class=\"serverTimestamp\">";
            // line 9
            echo $this->getAttribute($context["visitor"], "serverTimestamp", array());
            echo "</span>
                ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "serverDatePretty", array()), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "serverTimePretty", array()), "html", null, true);
            echo " ";
            if (($this->getAttribute($context["visitor"], "visitDuration", array()) > 0)) {
                echo "<em>(";
                echo $this->getAttribute($context["visitor"], "visitDurationPretty", array());
                echo ")</em>";
            }
            // line 11
            echo "                ";
            if ($this->getAttribute($context["visitor"], "countryFlag", array(), "any", true, true)) {
                echo "&nbsp;<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "countryFlag", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "location", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
                echo " ";
                if ($this->getAttribute($context["visitor"], "providerName", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "providerName", array()), "html", null, true);
                }
                echo "\"/>";
            }
            // line 12
            echo "                ";
            if ($this->getAttribute($context["visitor"], "browserIcon", array(), "any", true, true)) {
                echo "&nbsp;<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "browserIcon", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "browserName", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "plugins", array()), "html", null, true);
                echo "\"/>";
            }
            // line 13
            echo "                ";
            if ($this->getAttribute($context["visitor"], "operatingSystemIcon", array(), "any", true, true)) {
                echo "&nbsp;<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "operatingSystemIcon", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "operatingSystem", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "resolution", array()), "html", null, true);
                echo "\"/>";
            }
            // line 14
            echo "                &nbsp;
                ";
            // line 15
            if ($this->getAttribute($context["visitor"], "visitConverted", array())) {
                // line 16
                echo "                <span title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute($context["visitor"], "goalConversions", array()))), "html", null, true);
                echo "\" class='visitorRank'>
                    <img src=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitConvertedIcon", array()), "html", null, true);
                echo "\" />
                    <span class='hash'>#</span>
                    ";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "goalConversions", array()), "html", null, true);
                echo "
                    ";
                // line 20
                if ($this->getAttribute($context["visitor"], "visitEcommerceStatusIcon", array())) {
                    // line 21
                    echo "                        &nbsp;-
                        <img src=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitEcommerceStatusIcon", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitEcommerceStatus", array()), "html", null, true);
                    echo "\"/>
                    ";
                }
                // line 24
                echo "                </span>
                ";
            }
            // line 26
            echo "                ";
            if ($this->getAttribute($context["visitor"], "visitorTypeIcon", array())) {
                // line 27
                echo "                    &nbsp;- <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitorTypeIcon", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
                echo "\"/>
                ";
            }
            // line 29
            echo "                ";
            if ((!twig_test_empty((($this->getAttribute($context["visitor"], "visitorId", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["visitor"], "visitorId", array()), false)) : (false))))) {
                // line 30
                echo "                <a class=\"visits-live-launch-visitor-profile rightLink\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo " ";
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "userId", array())))) {
                    echo $this->getAttribute($context["visitor"], "userId", array());
                }
                echo "\" data-visitor-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitorId", array()), "html", null, true);
                echo "\">
                    ";
                // line 31
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "userId", array())))) {
                    echo "<br/>";
                }
                // line 32
                echo "                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/>
                    ";
                // line 33
                echo (($this->getAttribute($context["visitor"], "userId", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["visitor"], "userId", array()), "")) : (""));
                echo "
                </a>
                ";
            }
            // line 36
            echo "                ";
            if ($this->getAttribute($context["visitor"], "visitIp", array())) {
                echo "- <span title=\"";
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "visitorId", array())))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitorID")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitorId", array()), "html", null, true);
                }
                echo "\">
                    IP: ";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "visitIp", array()), "html", null, true);
                echo "</span>
                ";
            }
            // line 39
            echo "            </div>
            <!--<div class=\"settings\"></div>-->
            <div class=\"referrer\">
                ";
            // line 42
            if (($this->getAttribute($context["visitor"], "referrerType", array(), "any", true, true) && ($this->getAttribute($context["visitor"], "referrerType", array()) != "direct"))) {
                // line 43
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
                echo "
                    ";
                // line 44
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "referrerUrl", array())))) {
                    // line 45
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerUrl", array()), "html", null, true);
                    echo "\" target=\"_blank\">
                    ";
                }
                // line 47
                echo "                    ";
                if ($this->getAttribute($context["visitor"], "searchEngineIcon", array(), "any", true, true)) {
                    // line 48
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "searchEngineIcon", array()), "html", null, true);
                    echo "\" />
                    ";
                }
                // line 50
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerName", array()), "html", null, true);
                echo "
                    ";
                // line 51
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "referrerUrl", array())))) {
                    // line 52
                    echo "                        </a>
                    ";
                }
                // line 54
                echo "                    ";
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "referrerKeyword", array())))) {
                    echo " - \"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerKeyword", array()), "html", null, true);
                    echo "\"";
                }
                // line 55
                echo "                    ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerKeyword", array()), "html", null, true);
                $context["keyword"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 56
                echo "                    ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerName", array()), "html", null, true);
                $context["searchName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 57
                echo "                    ";
                ob_start();
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerKeywordPosition", array()), "html", null, true);
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 58
                echo "                    ";
                if ((!twig_test_empty($this->getAttribute($context["visitor"], "referrerKeywordPosition", array())))) {
                    // line 59
                    echo "                        <span title='";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_KeywordRankedOnSearchResultForThisVisitor", $this->getContext($context, "keyword"), $this->getContext($context, "position"), $this->getContext($context, "searchName"))), "html", null, true);
                    echo "' class='visitorRank'>
                            <span class='hash'>#</span> ";
                    // line 60
                    echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "referrerKeywordPosition", array()), "html", null, true);
                    echo "
                        </span>
                    ";
                }
                // line 63
                echo "                ";
            } elseif ($this->getAttribute($context["visitor"], "referrerType", array(), "any", true, true)) {
                // line 64
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DirectEntry")), "html", null, true);
                echo "
                ";
            }
            // line 66
            echo "            </div>
            <div id=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["visitor"], "idVisit", array()), "html", null, true);
            echo "_actions\" class=\"settings\">
                <span class=\"pagesTitle\" title=\"";
            // line 68
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["visitor"], "actionDetails", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Pages")), "html", null, true);
            echo ":</span>&nbsp;
                ";
            // line 69
            $context["col"] = 0;
            // line 70
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["visitor"], "actionDetails", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 71
                echo "                    ";
                if (($this->getAttribute($context["loop"], "index", array()) <= $this->getContext($context, "maxPagesDisplayedByVisitor"))) {
                    // line 72
                    echo "                        ";
                    if ((($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder") || ($this->getAttribute($context["action"], "type", array()) == "ecommerceAbandonedCart"))) {
                        // line 73
                        echo "                            ";
                        ob_start();
                        // line 74
                        if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                            // line 75
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                        } else {
                            // line 77
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                        }
                        // line 79
                        echo "
 - ";
                        // line 80
                        if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                            // line 81
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            echo ":";
                        } else {
                            // line 83
                            ob_start();
                            // line 84
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                            // line 86
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", $this->getContext($context, "revenueLeft"))), "html", null, true);
                            echo ":";
                        }
                        // line 87
                        echo " ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getContext($context, "idSite")));
                        // line 89
                        echo "
 - ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                        // line 90
                        echo "
";
                        // line 91
                        if ((!twig_test_empty($this->getAttribute($context["action"], "itemDetails", array())))) {
                            // line 92
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "itemDetails", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                // line 93
                                echo "
# ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemSKU", array()), "html", null, true);
                                if ((!twig_test_empty($this->getAttribute($context["product"], "itemName", array())))) {
                                    echo ": ";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemName", array()), "html", null, true);
                                }
                                if ((!twig_test_empty($this->getAttribute($context["product"], "itemCategory", array())))) {
                                    echo " (";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "itemCategory", array()), "html", null, true);
                                    echo ")";
                                }
                                echo ", ";
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                                echo ", ";
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                                echo ": ";
                                echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["product"], "price", array()), $this->getContext($context, "idSite")));
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                        }
                        // line 96
                        echo "                            ";
                        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 97
                        echo "                            <span title=\"";
                        echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
                        echo "\">
\t\t\t\t\t\t        <img class='iconPadding' src=\"";
                        // line 98
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                        echo "\"/>
                                ";
                        // line 99
                        if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                            // line 100
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getContext($context, "idSite")));
                            echo "
                                ";
                        }
                        // line 102
                        echo "                            </span>
                        ";
                    } else {
                        // line 104
                        echo "                            ";
                        $context["col"] = ($this->getContext($context, "col") + 1);
                        // line 105
                        echo "                            ";
                        if (($this->getContext($context, "col") >= 9)) {
                            // line 106
                            echo "                                ";
                            $context["col"] = 0;
                            // line 107
                            echo "                            ";
                        }
                        // line 108
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                        echo "\" target=\"_blank\">
                                ";
                        // line 109
                        if (($this->getAttribute($context["action"], "type", array()) == "action")) {
                            // line 111
                            ob_start();
                            // line 112
                            if ((!twig_test_empty($this->getAttribute($context["action"], "pageTitle", array())))) {
                                echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "pageTitle", array())));
                            }
                            // line 113
                            echo "
";
                            // line 114
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                            echo "
";
                            // line 115
                            if ($this->getAttribute($context["action"], "timeSpentPretty", array(), "any", true, true)) {
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                                echo ": ";
                                echo $this->getAttribute($context["action"], "timeSpentPretty", array());
                            }
                            $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                            // line 117
                            echo "                                    <img src=\"plugins/Live/images/file";
                            echo twig_escape_filter($this->env, $this->getContext($context, "col"), "html", null, true);
                            echo ".png\" title=\"";
                            echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif ((($this->getAttribute($context["action"], "type", array()) == "outlink") || ($this->getAttribute($context["action"], "type", array()) == "download"))) {
                            // line 119
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 120
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif (($this->getAttribute($context["action"], "type", array()) == "search")) {
                            // line 122
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 123
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "siteSearchKeyword", array()), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif ((!twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false))))) {
                            // line 125
                            echo "                                    <img  class=\"iconPadding\" src='";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "'
                                        title=\"";
                            // line 126
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "eventCategory", array()), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "eventAction", array()), "html", null, true);
                            echo " ";
                            if ($this->getAttribute($context["action"], "eventName", array(), "any", true, true)) {
                                echo "- ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "eventName", array()), "html", null, true);
                            }
                            echo " ";
                            if ($this->getAttribute($context["action"], "eventValue", array(), "any", true, true)) {
                                echo "- ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "eventValue", array()), "html", null, true);
                            }
                            echo "\"/>
                                ";
                        } else {
                            // line 128
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 129
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "goalName", array()), "html", null, true);
                            echo " - ";
                            if (($this->getAttribute($context["action"], "revenue", array()) > 0)) {
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                                echo ": ";
                                echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getContext($context, "idSite")));
                                echo " - ";
                            }
                            echo " ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
                            echo "\"/>
                                ";
                        }
                        // line 131
                        echo "                            </a>
                        ";
                    }
                    // line 133
                    echo "                    ";
                }
                // line 134
                echo "                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "                ";
            if ((twig_length_filter($this->env, $this->getAttribute($context["visitor"], "actionDetails", array())) > $this->getContext($context, "maxPagesDisplayedByVisitor"))) {
                // line 136
                echo "                    <em>(";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_MorePagesNotDisplayed")), "html", null, true);
                echo ")</em>
                ";
            }
            // line 138
            echo "            </div>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        echo "</ul>
<script type=\"text/javascript\">
\$('#visitsLive').on('click', '.visits-live-launch-visitor-profile', function (e) {
    e.preventDefault();
    broadcast.propagateNewPopoverParameter('visitorProfile', \$(this).attr('data-visitor-id'));
    return false;
});
</script>";
    }

    public function getTemplateName()
    {
        return "@Live/getLastVisitsStart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  564 => 141,  556 => 138,  550 => 136,  547 => 135,  533 => 134,  530 => 133,  526 => 131,  512 => 129,  507 => 128,  488 => 126,  483 => 125,  474 => 123,  469 => 122,  462 => 120,  457 => 119,  449 => 117,  442 => 115,  438 => 114,  435 => 113,  431 => 112,  429 => 111,  427 => 109,  422 => 108,  419 => 107,  416 => 106,  413 => 105,  410 => 104,  406 => 102,  398 => 100,  396 => 99,  392 => 98,  387 => 97,  384 => 96,  358 => 93,  354 => 92,  352 => 91,  349 => 90,  345 => 89,  342 => 87,  338 => 86,  335 => 84,  333 => 83,  329 => 81,  327 => 80,  324 => 79,  321 => 77,  318 => 75,  316 => 74,  313 => 73,  310 => 72,  307 => 71,  289 => 70,  287 => 69,  279 => 68,  275 => 67,  272 => 66,  266 => 64,  263 => 63,  257 => 60,  252 => 59,  249 => 58,  243 => 57,  238 => 56,  233 => 55,  226 => 54,  222 => 52,  220 => 51,  215 => 50,  209 => 48,  206 => 47,  200 => 45,  198 => 44,  193 => 43,  191 => 42,  186 => 39,  181 => 37,  170 => 36,  164 => 33,  161 => 32,  157 => 31,  146 => 30,  143 => 29,  135 => 27,  132 => 26,  128 => 24,  121 => 22,  118 => 21,  116 => 20,  112 => 19,  107 => 17,  102 => 16,  100 => 15,  97 => 14,  86 => 13,  73 => 12,  58 => 11,  48 => 10,  44 => 9,  38 => 8,  34 => 7,  29 => 6,  25 => 5,  21 => 3,  19 => 2,);
    }
}
