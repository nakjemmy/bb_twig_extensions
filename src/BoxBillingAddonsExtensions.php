<?php

namespace Uhg;

use \Carbon\Carbon;

class BoxBillingAddonsExtensions extends \Twig\Extension\AbstractExtension
{
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



        // Add Carbon parse
        $functions[] = new \Twig\TwigFunction("uhg_carbon_parse", function ($date_string) {
            return Carbon::parse($date_string);
        });



        return $functions;
    }
}