<?php

/* @CoreHome/_dataTableFooter.twig */
class __TwigTemplate_a36a7e84542c4c6ae3e028dbc5a7767c279c5ed1b9eba6a22218e195298d53a6 extends Twig_Template
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
        echo "<div class=\"dataTableFeatures\">

    <div class=\"dataTableFooterNavigation\">
        ";
        // line 4
        if ($this->getAttribute($this->getContext($context, "properties"), "show_offset_information", array())) {
            // line 5
            echo "            <span>
                <span class=\"dataTablePages\"></span>
            </span>
        ";
        }
        // line 9
        echo "
        ";
        // line 10
        if ($this->getAttribute($this->getContext($context, "properties"), "show_pagination_control", array())) {
            // line 11
            echo "            <span>
                <span class=\"dataTablePrevious\">&lsaquo; ";
            // line 12
            if ($this->getAttribute($this->getContext($context, "clientSideParameters", true), "dataTablePreviousIsFirst", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_First")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Previous")), "html", null, true);
            }
            echo " </span>
                <span class=\"dataTableNext\">";
            // line 13
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
            echo " &rsaquo;</span>
            </span>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        if ($this->getAttribute($this->getContext($context, "properties"), "show_search", array())) {
            // line 18
            echo "            <span class=\"dataTableSearchPattern\">
                <input type=\"text\" class=\"searchInput\" length=\"15\" />
                <input type=\"submit\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Search")), "html", null, true);
            echo "\" />
            </span>
        ";
        }
        // line 23
        echo "    </div>

    <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"plugins/Morpheus/images/loading-blue.gif\"/> ";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>

    ";
        // line 27
        if ($this->getAttribute($this->getContext($context, "properties"), "show_footer_icons", array())) {
            // line 28
            echo "        <div class=\"dataTableFooterIcons\">
            <div class=\"dataTableFooterWrap\">
                ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "footerIcons"));
            foreach ($context['_seq'] as $context["_key"] => $context["footerIconGroup"]) {
                // line 31
                echo "                    <div class=\"tableIconsGroup\">
                    <span class=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["footerIconGroup"], "class", array()), "html", null, true);
                echo "\">
                    ";
                // line 33
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["footerIconGroup"], "buttons", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["footerIcon"]) {
                    // line 34
                    echo "                        <span>
                            ";
                    // line 35
                    if (($this->getAttribute($this->getContext($context, "properties"), "show_active_view_icon", array()) && ($this->getAttribute($this->getContext($context, "clientSideParameters"), "viewDataTable", array()) == $this->getAttribute($context["footerIcon"], "id", array())))) {
                        // line 36
                        echo "                                <img src=\"plugins/Morpheus/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                            ";
                    }
                    // line 38
                    echo "                            <a class=\"tableIcon ";
                    if (($this->getAttribute($this->getContext($context, "clientSideParameters"), "viewDataTable", array()) == $this->getAttribute($context["footerIcon"], "id", array()))) {
                        echo "activeIcon";
                    }
                    echo "\" data-footer-icon-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "id", array()), "html", null, true);
                    echo "\">
                                <img width=\"16\" height=\"16\" title=\"";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "icon", array()), "html", null, true);
                    echo "\"/>
                                ";
                    // line 40
                    if ($this->getAttribute($context["footerIcon"], "text", array(), "any", true, true)) {
                        echo "<span>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "text", array()), "html", null, true);
                        echo "</span>";
                    }
                    // line 41
                    echo "                            </a>
                        </span>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "                    </span>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIconGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "                <div class=\"tableIconsGroup\">
                    ";
            // line 48
            if (twig_test_empty($this->getContext($context, "footerIcons"))) {
                // line 49
                echo "                        <img src=\"plugins/Morpheus/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                    ";
            }
            // line 51
            echo "                    <span class=\"exportToFormatIcons\">
                        <a class=\"tableIcon\" var=\"export\">
                            <img width=\"16\" height=\"16\" src=\"plugins/Morpheus/images/export.png\" title=\"";
            // line 53
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html", null, true);
            echo "\"/>
                        </a>
                    </span>
\t\t\t\t    <span class=\"exportToFormatItems\" style=\"display:none;\">
\t\t\t\t\t";
            // line 57
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Export")), "html", null, true);
            echo ":
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"CSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
            echo "\">CSV</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"TSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
            echo "\">TSV (Excel)</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"XML\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
            echo "\">XML</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"JSON\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
            echo "\">Json</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"PHP\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
            echo "\">Php</a>
                        ";
            // line 63
            if ($this->getAttribute($this->getContext($context, "properties"), "show_export_as_rss_feed", array())) {
                // line 64
                echo "                            |
                            <a target=\"_blank\" methodToCall=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"RSS\" filter_limit=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "export_limit", array()), "html", null, true);
                echo "\" date=\"last10\">
                                <img border=\"0\" src=\"plugins/Morpheus/images/feed.png\"/>
                            </a>
                        ";
            }
            // line 69
            echo "\t\t\t\t    </span>
                    ";
            // line 70
            if ($this->getAttribute($this->getContext($context, "properties"), "show_export_as_image_icon", array())) {
                // line 71
                echo "                        <span id=\"dataTableFooterExportAsImageIcon\">
                            <a class=\"tableIcon\" href=\"#\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                                <img title=\"";
                // line 73
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportAsImage")), "html", null, true);
                echo "\" src=\"plugins/Morpheus/images/image.png\"/>
                            </a>
                        </span>
                    ";
            }
            // line 77
            echo "                </div>

            </div>
            <div class=\"limitSelection ";
            // line 80
            if (((!$this->getAttribute($this->getContext($context, "properties"), "show_pagination_control", array())) && (!$this->getAttribute($this->getContext($context, "properties"), "show_limit_control", array())))) {
                echo " hidden";
            }
            echo "\"
                 title=\"";
            // line 81
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RowsToDisplay")), "html", null, true);
            echo "\"></div>
            <div class=\"tableConfiguration\">
                <a class=\"tableConfigurationIcon\" href=\"#\"></a>
                <ul>
                    ";
            // line 85
            if ($this->getAttribute($this->getContext($context, "properties"), "show_flatten_table", array())) {
                // line 86
                echo "                        ";
                if (($this->getAttribute($this->getContext($context, "clientSideParameters", true), "flat", array(), "any", true, true) && ($this->getAttribute($this->getContext($context, "clientSideParameters"), "flat", array()) == 1))) {
                    // line 87
                    echo "                            <li>
                                <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                            </li>
                        ";
                }
                // line 91
                echo "                        <li>
                            <div class=\"configItem dataTableFlatten\"></div>
                        </li>
                    ";
            }
            // line 95
            echo "                    ";
            if ($this->getAttribute($this->getContext($context, "properties"), "show_exclude_low_population", array())) {
                // line 96
                echo "                        <li>
                            <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                        </li>
                    ";
            }
            // line 100
            echo "                    ";
            if ((!twig_test_empty((($this->getAttribute($this->getContext($context, "properties", true), "show_pivot_by_subtable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "properties", true), "show_pivot_by_subtable", array()))) : (""))))) {
                // line 101
                echo "                        <li>
                            <div class=\"configItem dataTablePivotBySubtable\"></div>
                        </li>
                    ";
            }
            // line 105
            echo "                </ul>
            </div>
            ";
            // line 107
            if ((call_user_func_array($this->env->getFunction('isPluginLoaded')->getCallable(), array("Annotations")) && (!$this->getAttribute($this->getContext($context, "properties"), "hide_annotations_view", array())))) {
                // line 108
                echo "                <div class=\"annotationView\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_IconDesc")), "html", null, true);
                echo "\">
                    <a class=\"tableIcon\">
                        <img width=\"16\" height=\"16\" src=\"plugins/Morpheus/images/annotations.png\"/>
                    </a>
                    <span>";
                // line 112
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_Annotations")), "html", null, true);
                echo "</span>
                </div>
            ";
            }
            // line 115
            echo "
            <div class=\"foldDataTableFooterDrawer\" title=\"";
            // line 116
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html_attr");
            echo "\"
                    ><img width=\"7\" height=\"4\" src=\"plugins/Morpheus/images/sortasc_dark.png\"></div>

        </div>
        <div class=\"expandDataTableFooterDrawer\" title=\"";
            // line 120
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExpandDataTableFooter")), "html_attr");
            echo "\"
                ><img width=\"7\" height=\"4\" src=\"plugins/Morpheus/images/sortdesc_dark.png\" style=\"\"></div>
    ";
        }
        // line 123
        echo "
    <div class=\"datatableRelatedReports\">
        ";
        // line 125
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "properties"), "related_reports", array()))) && $this->getAttribute($this->getContext($context, "properties"), "show_related_reports", array()))) {
            // line 126
            echo "            ";
            echo $this->getAttribute($this->getContext($context, "properties"), "related_reports_title", array());
            echo "
            <ul style=\"list-style:none;";
            // line 127
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "related_reports", array())) == 1)) {
                echo "display:inline-block;";
            }
            echo "}\">
                <li><span href=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "self_url", array()), "html", null, true);
            echo "\" style=\"display:none;\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "properties"), "title", array()), "html", null, true);
            echo "</span></li>

                ";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "properties"), "related_reports", array()));
            foreach ($context['_seq'] as $context["reportUrl"] => $context["reportTitle"]) {
                // line 131
                echo "                    <li><span href=\"";
                echo twig_escape_filter($this->env, $context["reportUrl"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["reportTitle"], "html", null, true);
                echo "</span></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['reportUrl'], $context['reportTitle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "            </ul>
        ";
        }
        // line 135
        echo "    </div>

    ";
        // line 137
        if (($this->getAttribute($this->getContext($context, "properties", true), "show_footer_message", array(), "any", true, true) && (!twig_test_empty($this->getAttribute($this->getContext($context, "properties"), "show_footer_message", array()))))) {
            // line 138
            echo "        <div class='datatableFooterMessage'>";
            echo $this->getAttribute($this->getContext($context, "properties"), "show_footer_message", array());
            echo "</div>
    ";
        }
        // line 140
        echo "
</div>

<span class=\"loadingPiwikBelow\" style=\"display:none;\"><img src=\"plugins/Morpheus/images/loading-blue.gif\"/> ";
        // line 143
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>

<div class=\"dataTableSpacer\"></div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableFooter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 143,  373 => 140,  367 => 138,  365 => 137,  361 => 135,  357 => 133,  346 => 131,  342 => 130,  335 => 128,  329 => 127,  324 => 126,  322 => 125,  318 => 123,  312 => 120,  305 => 116,  302 => 115,  296 => 112,  288 => 108,  286 => 107,  282 => 105,  276 => 101,  273 => 100,  267 => 96,  264 => 95,  258 => 91,  252 => 87,  249 => 86,  247 => 85,  240 => 81,  234 => 80,  229 => 77,  222 => 73,  218 => 71,  216 => 70,  213 => 69,  204 => 65,  201 => 64,  199 => 63,  193 => 62,  187 => 61,  181 => 60,  175 => 59,  169 => 58,  165 => 57,  158 => 53,  154 => 51,  150 => 49,  148 => 48,  145 => 47,  137 => 44,  129 => 41,  123 => 40,  117 => 39,  108 => 38,  104 => 36,  102 => 35,  99 => 34,  95 => 33,  91 => 32,  88 => 31,  84 => 30,  80 => 28,  78 => 27,  73 => 25,  69 => 23,  63 => 20,  59 => 18,  57 => 17,  54 => 16,  48 => 13,  40 => 12,  37 => 11,  35 => 10,  32 => 9,  26 => 5,  24 => 4,  19 => 1,);
    }
}
