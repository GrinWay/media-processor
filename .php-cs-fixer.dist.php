<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude(['var', 'vendor', 'templates', 'translations', 'migrations', 'bin']);

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'php_unit_method_casing' => ['case' => 'camel_case'],
    ])
    ->setFinder($finder);
