<?php
// config/config.php

$dir = __DIR__ . '/..';

$iterator = Symfony\Component\Finder\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('build')
    ->exclude('tests')
    ->in($dir);

$options = [
    'theme'                => 'default',
    'title'                => 'Restaurant API Documentation',
    'build_dir'            => __DIR__ . '/../build/restaurant',
    'cache_dir'            => __DIR__ . '/../cache/restaurant',
];

$sami = new Sami\Sami($iterator, $options);

return $sami;
