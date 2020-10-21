<?php

namespace Main;


class BoxBillingAddonsExtensions extends \Twig\Extension\AbstractExtension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return \Twig\TokenParser\TokenParserInterface[]
     */
    public function getTokenParsers()
    {
    }

    /**
     * Returns the node visitor instances to add to the existing list.
     *
     * @return \Twig\NodeVisitor\NodeVisitorInterface[]
     */
    public function getNodeVisitors()
    {
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return \Twig\TwigFilter[]
     */
    public function getFilters()
    {
    }

    /**
     * Returns a list of tests to add to the existing list.
     *
     * @return \Twig\TwigTest[]
     */
    public function getTests()
    {
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig\TwigFunction[]
     */
    public function getFunctions()
    {
        $functions = [];
        // Add all php functions
        $uhg_php_functions = get_defined_functions();

        foreach ($uhg_php_functions['internal'] as $key => $value) {

            $functions[] = new \Twig\TwigFunction("uhg_$value", $value);
        }

        // Add Custom Functions


        $functions[] = new \Twig\TwigFunction("uhg_partial_match", function ($test_string, $values) {
            foreach ($values as $value) {
                if (strpos($test_string, $value) !== false) {
                    return true;
                }
            }

            return false;
        });




        return $functions;
    }

    /**
     * Returns a list of operators to add to the existing list.
     *
     * @return array<array> First array of unary operators, second array of binary operators
     */
    public function getOperators()
    {
    }
}