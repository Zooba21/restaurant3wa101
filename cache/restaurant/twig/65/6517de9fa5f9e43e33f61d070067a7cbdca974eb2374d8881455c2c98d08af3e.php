<?php

/* sami.js.twig */
class __TwigTemplate_aa59d12da038b06638a20b0342ff62cd6628ac1c245db4a7b4f3c31906e14825 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'search_index' => array($this, 'block_search_index'),
            'search_index_extra' => array($this, 'block_search_index_extra'),
            'treejs' => array($this, 'block_treejs'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_a3a97b966bd96634cdc66117689d821255388c439cc453584c6456fcf89f27bf"] = $this;
        // line 2
        echo "
window.projectVersion = '";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new Twig_Error_Runtime('Variable "project" does not exist.', 3, $this->getSourceContext()); })()), "version", array()), "html", null, true);
        echo "';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '";
        // line 9
        echo twig_replace_filter($context["__internal_a3a97b966bd96634cdc66117689d821255388c439cc453584c6456fcf89f27bf"]->macro_element((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new Twig_Error_Runtime('Variable "tree" does not exist.', 9, $this->getSourceContext()); })()), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new Twig_Error_Runtime('Variable "project" does not exist.', 9, $this->getSourceContext()); })()), "config", array(0 => "default_opened_level"), "method"), 0), array("'" => "\\'", "
" => ""));
        echo "';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
        ";
        // line 21
        $this->displayBlock('search_index', $context, $blocks);
        // line 41
        echo "        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if \"::\" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\\\') > -1) {
            tokens = tokens.concat(term.split('\\\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string \"search\" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp(\"[\\\\?&]\" + name + \"=([^&#]*)\");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\\+/g, \" \"));
            }

            return term.replace(/<(?:.|\\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return \$.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    \$(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = \$('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href=\"/g, 'href=\"' + rootPath);
        Sami.injectApiTree(\$('#api-tree'));
    });

    return root.Sami;
})(window);

\$(function() {

    // Enable the version switcher
    \$('#version-switcher').change(function() {
        window.location = \$(this).val()
    });

    ";
        // line 158
        $this->displayBlock('treejs', $context, $blocks);
        // line 184
        echo "
    ";
        // line 212
        echo "
        var form = \$('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                \$('#search-form').submit();
                return true;
            }
        });

    ";
        echo "
});

";
        // line 224
        echo "
";
    }

    // line 21
    public function block_search_index($context, array $blocks = array())
    {
        // line 22
        echo "            ";
        $context["__internal_f14d5f4d2cb3196095dde34f2aee126a45f91e1fdec5803bac03cc3180390742"] = $this;
        // line 23
        echo "
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["namespaces"]) || array_key_exists("namespaces", $context) ? $context["namespaces"] : (function () { throw new Twig_Error_Runtime('Variable "namespaces" does not exist.', 24, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
            // line 25
            echo "{\"type\": \"Namespace\", \"link\": \"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, $context["ns"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter($context["ns"], array("\\" => "\\\\"));
            echo "\", \"doc\": \"Namespace ";
            echo twig_replace_filter($context["ns"], array("\\" => "\\\\"));
            echo "\"},";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["interfaces"]) || array_key_exists("interfaces", $context) ? $context["interfaces"] : (function () { throw new Twig_Error_Runtime('Variable "interfaces" does not exist.', 28, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 29
            echo "{\"type\": \"Interface\", ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array())) {
                echo "\"fromName\": \"";
                echo twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array()), array("\\" => "\\\\"));
                echo "\", \"fromLink\": \"";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array()));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "name", array()), array("\\" => "\\\\"));
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, json_encode($this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "shortdesc", array()), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 30
            echo $context["__internal_f14d5f4d2cb3196095dde34f2aee126a45f91e1fdec5803bac03cc3180390742"]->macro_add_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
            ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new Twig_Error_Runtime('Variable "classes" does not exist.', 33, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 34
            echo "{\"type\": ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "isTrait", array())) {
                echo "\"Trait\"";
            } else {
                echo "\"Class\"";
            }
            echo ", ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array())) {
                echo "\"fromName\": \"";
                echo twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array()), array("\\" => "\\\\"));
                echo "\", \"fromLink\": \"";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "namespace", array()));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "name", array()), array("\\" => "\\\\"));
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, json_encode($this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["class"], "shortdesc", array()), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 35
            echo $context["__internal_f14d5f4d2cb3196095dde34f2aee126a45f91e1fdec5803bac03cc3180390742"]->macro_add_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "
            ";
        // line 39
        echo "            ";
        $this->displayBlock('search_index_extra', $context, $blocks);
        // line 40
        echo "        ";
    }

    // line 39
    public function block_search_index_extra($context, array $blocks = array())
    {
        echo "";
    }

    // line 158
    public function block_treejs($context, array $blocks = array())
    {
        // line 159
        echo "
        // Toggle left-nav divs on click
        \$('#api-tree .hd span').click(function() {
            \$(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = \$('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = \$('#api-tree');
            var node = \$('#api-tree li[data-name=\"' + expected + '\"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    ";
    }

    // line 215
    public function macro_add_class_methods_index($__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 216
            echo "    ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new Twig_Error_Runtime('Variable "class" does not exist.', 216, $this->getSourceContext()); })()), "methods", array())) {
                // line 217
                echo "        ";
                $context["from_name"] = twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new Twig_Error_Runtime('Variable "class" does not exist.', 217, $this->getSourceContext()); })()), "name", array()), array("\\" => "\\\\"));
                // line 218
                echo "        ";
                $context["from_link"] = $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForClass($context, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new Twig_Error_Runtime('Variable "class" does not exist.', 218, $this->getSourceContext()); })()));
                // line 219
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new Twig_Error_Runtime('Variable "class" does not exist.', 219, $this->getSourceContext()); })()), "methods", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["meth"]) {
                    // line 220
                    echo "            {\"type\": \"Method\", \"fromName\": \"";
                    echo (isset($context["from_name"]) || array_key_exists("from_name", $context) ? $context["from_name"] : (function () { throw new Twig_Error_Runtime('Variable "from_name" does not exist.', 220, $this->getSourceContext()); })());
                    echo "\", \"fromLink\": \"";
                    echo (isset($context["from_link"]) || array_key_exists("from_link", $context) ? $context["from_link"] : (function () { throw new Twig_Error_Runtime('Variable "from_link" does not exist.', 220, $this->getSourceContext()); })());
                    echo "\", \"link\": \"";
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForMethod($context, $context["meth"]);
                    echo "\", \"name\": \"";
                    echo twig_replace_filter($context["meth"], array("\\" => "\\\\"));
                    echo "\", \"doc\": \"";
                    echo twig_escape_filter($this->env, json_encode($this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["meth"], "shortdesc", array()), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new Twig_Error_Runtime('Variable "class" does not exist.', 220, $this->getSourceContext()); })()))), "html", null, true);
                    echo "\"},
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meth'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 222
                echo "    ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 225
    public function macro_element($__tree__ = null, $__opened__ = null, $__depth__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "tree" => $__tree__,
            "opened" => $__opened__,
            "depth" => $__depth__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 226
            echo "    ";
            $context["__internal_d71d3d3eb56a1a95104e543bfb1109086edad51b113e28eca5ee99d54fb1fd58"] = $this;
            // line 227
            echo "
    <ul>";
            // line 229
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new Twig_Error_Runtime('Variable "tree" does not exist.', 229, $this->getSourceContext()); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 230
                if (twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 2, array(), "array")) {
                    // line 231
                    echo "                <li data-name=\"namespace:";
                    echo twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 1, array(), "array"), array("\\" => "_"));
                    echo "\" ";
                    if (((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new Twig_Error_Runtime('Variable "depth" does not exist.', 231, $this->getSourceContext()); })()) < (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new Twig_Error_Runtime('Variable "opened" does not exist.', 231, $this->getSourceContext()); })()))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 232
                    echo ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new Twig_Error_Runtime('Variable "depth" does not exist.', 232, $this->getSourceContext()); })()) * 18);
                    echo "px\" class=\"hd\">
                        <span class=\"glyphicon glyphicon-play\"></span>";
                    // line 233
                    if ( !twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new Twig_Error_Runtime('Variable "project" does not exist.', 233, $this->getSourceContext()); })()), "config", array(0 => "simulate_namespaces"), "method")) {
                        echo "<a href=\"";
                        echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 1, array(), "array"));
                        echo "\">";
                    }
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 0, array(), "array");
                    if ( !twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new Twig_Error_Runtime('Variable "project" does not exist.', 233, $this->getSourceContext()); })()), "config", array(0 => "simulate_namespaces"), "method")) {
                        echo "</a>";
                    }
                    // line 234
                    echo "                    </div>
                    <div class=\"bd\">
                        ";
                    // line 236
                    echo $context["__internal_d71d3d3eb56a1a95104e543bfb1109086edad51b113e28eca5ee99d54fb1fd58"]->macro_element(twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 2, array(), "array"), (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new Twig_Error_Runtime('Variable "opened" does not exist.', 236, $this->getSourceContext()); })()), ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new Twig_Error_Runtime('Variable "depth" does not exist.', 236, $this->getSourceContext()); })()) + 1));
                    // line 237
                    echo "</div>
                </li>
            ";
                } else {
                    // line 240
                    echo "                <li data-name=\"class:";
                    echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 1, array(), "array"), "name", array()), array("\\" => "_")), "html", null, true);
                    echo "\" ";
                    if (((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new Twig_Error_Runtime('Variable "depth" does not exist.', 240, $this->getSourceContext()); })()) < (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new Twig_Error_Runtime('Variable "opened" does not exist.', 240, $this->getSourceContext()); })()))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 241
                    echo twig_escape_filter($this->env, (8 + ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new Twig_Error_Runtime('Variable "depth" does not exist.', 241, $this->getSourceContext()); })()) * 18)), "html", null, true);
                    echo "px\" class=\"hd leaf\">
                        <a href=\"";
                    // line 242
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForClass($context, twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 1, array(), "array"));
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["element"], 0, array(), "array"), "html", null, true);
                    echo "</a>
                    </div>
                </li>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 247
            echo "    </ul>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "sami.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  497 => 247,  484 => 242,  480 => 241,  471 => 240,  466 => 237,  464 => 236,  460 => 234,  450 => 233,  446 => 232,  437 => 231,  435 => 230,  431 => 229,  428 => 227,  425 => 226,  411 => 225,  401 => 222,  384 => 220,  379 => 219,  376 => 218,  373 => 217,  370 => 216,  358 => 215,  330 => 159,  327 => 158,  321 => 39,  317 => 40,  314 => 39,  311 => 37,  303 => 35,  280 => 34,  276 => 33,  273 => 32,  265 => 30,  248 => 29,  244 => 28,  241 => 27,  229 => 25,  225 => 24,  222 => 23,  219 => 22,  216 => 21,  211 => 224,  178 => 212,  175 => 184,  173 => 158,  54 => 41,  52 => 21,  36 => 9,  27 => 3,  24 => 2,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% from _self import element %}

window.projectVersion = '{{ project.version }}';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '{{ element(tree, project.config('default_opened_level'), 0)|replace({\"'\": \"\\\\'\", \"\\n\": ''})|raw }}';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
        {% block search_index %}
            {% from _self import add_class_methods_index %}

            {% for ns in namespaces -%}
                {\"type\": \"Namespace\", \"link\": \"{{ namespace_path(ns) }}\", \"name\": \"{{ ns|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"Namespace {{ ns|replace({'\\\\': '\\\\\\\\'})|raw }}\"},
            {%- endfor %}

            {% for class in interfaces -%}
                {\"type\": \"Interface\", {% if class.namespace %}\"fromName\": \"{{ class.namespace|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"fromLink\": \"{{ namespace_path(class.namespace)|raw }}\",{% endif %} \"link\": \"{{ class_path(class) }}\", \"name\": \"{{ class.name|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ class.shortdesc|desc(class)|json_encode }}\"},
                {{ add_class_methods_index(class) }}
            {% endfor %}

            {% for class in classes -%}
                {\"type\": {% if class.isTrait %}\"Trait\"{% else %}\"Class\"{% endif %}, {% if class.namespace %}\"fromName\": \"{{ class.namespace|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"fromLink\": \"{{ namespace_path(class.namespace) }}\",{% endif %} \"link\": \"{{ class_path(class) }}\", \"name\": \"{{ class.name|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ class.shortdesc|desc(class)|json_encode }}\"},
                {{ add_class_methods_index(class) }}
            {% endfor %}

            {# Override this block, search_index_extra, to add custom search entries! #}
            {% block search_index_extra '' %}
        {% endblock %}
        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if \"::\" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\\\') > -1) {
            tokens = tokens.concat(term.split('\\\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string \"search\" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp(\"[\\\\?&]\" + name + \"=([^&#]*)\");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\\+/g, \" \"));
            }

            return term.replace(/<(?:.|\\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return \$.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    \$(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = \$('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href=\"/g, 'href=\"' + rootPath);
        Sami.injectApiTree(\$('#api-tree'));
    });

    return root.Sami;
})(window);

\$(function() {

    // Enable the version switcher
    \$('#version-switcher').change(function() {
        window.location = \$(this).val()
    });

    {% block treejs %}

        // Toggle left-nav divs on click
        \$('#api-tree .hd span').click(function() {
            \$(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = \$('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = \$('#api-tree');
            var node = \$('#api-tree li[data-name=\"' + expected + '\"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    {% endblock %}

    {% verbatim %}
        var form = \$('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                \$('#search-form').submit();
                return true;
            }
        });

    {% endverbatim %}
});

{% macro add_class_methods_index(class) %}
    {% if class.methods %}
        {% set from_name = class.name|replace({'\\\\': '\\\\\\\\'}) %}
        {% set from_link = class_path(class) %}
        {% for meth in class.methods %}
            {\"type\": \"Method\", \"fromName\": \"{{ from_name|raw }}\", \"fromLink\": \"{{ from_link|raw }}\", \"link\": \"{{ method_path(meth) }}\", \"name\": \"{{ meth|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ meth.shortdesc|desc(class)|json_encode }}\"},
        {% endfor %}
    {% endif %}
{% endmacro %}

{% macro element(tree, opened, depth) %}
    {% from _self import element %}

    <ul>
        {%- for element in tree -%}
            {% if element[2] %}
                <li data-name=\"namespace:{{ element[1]|replace({'\\\\': '_'})|raw }}\" {% if depth < opened %}class=\"opened\"{% endif %}>
                    <div style=\"padding-left:{{ (depth * 18)|raw }}px\" class=\"hd\">
                        <span class=\"glyphicon glyphicon-play\"></span>{% if not project.config('simulate_namespaces') %}<a href=\"{{ namespace_path(element[1]) }}\">{% endif %}{{ element[0]|raw }}{% if not project.config('simulate_namespaces') %}</a>{% endif %}
                    </div>
                    <div class=\"bd\">
                        {{ element(element[2], opened, depth + 1) -}}
                    </div>
                </li>
            {% else %}
                <li data-name=\"class:{{ (element[1].name)|replace({'\\\\': '_'}) }}\" {% if depth < opened %}class=\"opened\"{% endif %}>
                    <div style=\"padding-left:{{ 8 + (depth * 18) }}px\" class=\"hd leaf\">
                        <a href=\"{{ class_path(element[1]) }}\">{{ element[0] }}</a>
                    </div>
                </li>
            {% endif %}
        {%- endfor %}
    </ul>
{% endmacro %}
", "sami.js.twig", "/home/wap38/sites/restaurant/vendor/sami/sami/Sami/Resources/themes/default/sami.js.twig");
    }
}
