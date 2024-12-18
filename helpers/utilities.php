<?php

use FeatureNinja\Cva\ClassVarianceAuthority;

/**
 * @param string|array<int, string> $base
 * @param array{
 *     variants?: array<string, array<string, string|array<int, string>>>,
 *     compoundVariants?: array<int, array<string, string>>,
 *     defaultVariants?: array<string, string>
 * } $config
 */
function cva(string|array $base, array $config): ClassVarianceAuthority
{
    return ClassVarianceAuthority::new($base, $config);
}


if (!function_exists('path')) {
    /**
     * Return the current route path
     */
    function path(): string
    {
        return str(url()->current())->replace(
			config('app.url'), ''
		);
    }
}
