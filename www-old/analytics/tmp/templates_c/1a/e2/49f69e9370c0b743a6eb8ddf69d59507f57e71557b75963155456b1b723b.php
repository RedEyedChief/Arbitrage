<?php

/* @CoreHome/_headerMessage.twig */
class __TwigTemplate_1ae249f69e9370c0b743a6eb8ddf69d59507f57e71557b75963155456b1b723b extends Twig_Template
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
        $context["test_latest_version_available"] = "3.0";
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo twig_escape_filter($this->env, (($this->getContext($context, "piwikUrl") == "http://demo.piwik.org/") || ($this->getContext($context, "piwikUrl") == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
";
        // line 6
        ob_start();
        // line 7
        echo "<div id=\"updateCheckLinkContainer\">
    <span class='loadingPiwik' style=\"display:none;\"><img src='plugins/Morpheus/images/loading-blue.gif'/></span>
    <img class=\"icon\" src=\"plugins/Morpheus/images/reload.png\"/>
    <a href=\"#\" id=\"checkForUpdates\"><em>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CheckForUpdates")), "html", null, true);
        echo "</em></a>
</div>
";
        $context["updateCheck"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        echo "
";
        // line 14
        if ((($this->getContext($context, "isPiwikDemo") || (($this->getContext($context, "latest_version_available") && $this->getContext($context, "hasSomeViewAccess")) && (!$this->getContext($context, "isUserIsAnonymous")))) || (($this->getContext($context, "isSuperUser") && array_key_exists("adminMenu", $context)) && $this->getContext($context, "adminMenu")))) {
            // line 15
            echo "<span id=\"header_message\" class=\"";
            if (($this->getContext($context, "isPiwikDemo") || (!$this->getContext($context, "latest_version_available")))) {
                echo "header_info";
            } else {
                echo "header_alert";
            }
            echo "\">
    <span class=\"header_short\">
        ";
            // line 17
            if ($this->getContext($context, "isPiwikDemo")) {
                // line 18
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
        ";
            } elseif ($this->getContext($context, "latest_version_available")) {
                // line 20
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", $this->getContext($context, "latest_version_available"))), "html", null, true);
                echo "
        ";
            } elseif ((($this->getContext($context, "isSuperUser") && array_key_exists("adminMenu", $context)) && $this->getContext($context, "adminMenu"))) {
                // line 22
                echo "            ";
                echo $this->getContext($context, "updateCheck");
                echo "
        ";
            }
            // line 24
            echo "    </span>

    <span class=\"header_full\">
        ";
            // line 27
            if ($this->getContext($context, "isPiwikDemo")) {
                // line 28
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
            <br />
            ";
                // line 30
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DownloadFullVersion", "<a href='http://piwik.org/'>", "</a>", "<a href='http://piwik.org'>piwik.org</a>"));
                echo "
            <br/>
        ";
            }
            // line 33
            echo "        ";
            if (($this->getContext($context, "latest_version_available") && $this->getContext($context, "isSuperUser"))) {
                // line 34
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseUpdateNow", $this->getContext($context, "latest_version_available"), "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>"));
                echo "
            <br/>
            ";
                // line 36
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", $this->getContext($context, "piwik_version"))), "html", null, true);
                echo "
        ";
            } elseif (((($this->getContext($context, "latest_version_available") && (!$this->getContext($context, "isPiwikDemo"))) && $this->getContext($context, "hasSomeViewAccess")) && (!$this->getContext($context, "isUserIsAnonymous")))) {
                // line 38
                echo "            ";
                $context["updateSubject"] = twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", $this->getContext($context, "latest_version_available"))), "url");
                // line 39
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseNotifyPiwikAdmin", (("<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>" . $this->getContext($context, "latest_version_available")) . "</a>"), (((("<a href='mailto:" . $this->getContext($context, "superUserEmails")) . "?subject=") . $this->getContext($context, "updateSubject")) . "'>"), "</a>"));
                echo "
        ";
            } elseif ((($this->getContext($context, "isSuperUser") && array_key_exists("adminMenu", $context)) && $this->getContext($context, "adminMenu"))) {
                // line 41
                echo "            ";
                echo $this->getContext($context, "updateCheck");
                echo "
            <br />
            ";
                // line 43
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", $this->getContext($context, "piwik_version"))), "html", null, true);
                echo "
        ";
            }
            // line 45
            echo "    </span>
</span>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_headerMessage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 45,  126 => 43,  120 => 41,  114 => 39,  111 => 38,  106 => 36,  100 => 34,  97 => 33,  91 => 30,  85 => 28,  83 => 27,  78 => 24,  72 => 22,  66 => 20,  60 => 18,  58 => 17,  48 => 15,  46 => 14,  43 => 13,  37 => 10,  32 => 7,  30 => 6,  27 => 5,  23 => 4,  21 => 3,  19 => 2,);
    }
}
