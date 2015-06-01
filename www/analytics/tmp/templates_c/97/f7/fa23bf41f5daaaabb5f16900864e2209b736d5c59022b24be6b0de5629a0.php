<?php

/* _piwikTag.twig */
class __TwigTemplate_97f7fa23bf41f5daaaabb5f16900864e2209b736d5c59022b24be6b0de5629a0 extends Twig_Template
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
        echo "
";
        // line 3
        if ((($this->getContext($context, "piwikUrl") == "http://demo.piwik.org/") || $this->getContext($context, "enableMeasurePiwikForSiteId"))) {
            // line 4
            echo "    <div class=\"clear\"></div>
    <!-- Piwik -->
    <script type=\"text/javascript\">
    var _paq = _paq || [];
    _paq.push(['setTrackerUrl', 'piwik.php']);
    _paq.push(['setSiteId', ";
            // line 9
            echo twig_escape_filter($this->env, $this->getContext($context, "enableMeasurePiwikForSiteId"), "html", null, true);
            echo "]);
    _paq.push(['setCookieDomain', '*.piwik.org']);
    // set the domain the visitor landed on, in the Custom Variable
    _paq.push([function () {
    if (!this.getCustomVariable(1)) {
        this.setCustomVariable(1, \"Domain landed\", document.domain);
    }
    }]);
    // Set the selected Piwik language in a custom var
    _paq.push(['setCustomVariable', 2, \"Demo language\", piwik.languageName]);
    _paq.push(['setDocumentTitle', document.domain + \"/\" + document.title]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    _paq.push(['enableJSErrorTracking']);

    (function() {
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src='js/piwik.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <!-- End Piwik Code -->
";
        }
    }

    public function getTemplateName()
    {
        return "_piwikTag.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 9,  24 => 4,  22 => 3,  19 => 2,);
    }
}
