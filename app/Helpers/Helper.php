<?php
function activeRoute($route, $isClass = false): string
{
    $requestUrl = request()->fullUrl() === $route ? true : false;

    if($isClass) {
        return $requestUrl ? $isClass : '';
    } else {
        return $requestUrl ? 'active' : '';
    }
}

if (! function_exists('formato_peso')) {
    /**
     * Formatea un valor numérico en formato de peso colombiano.
     * Ejemplo: 3000000 => $ 3.000.000
     */
    function formato_peso(float $valor, int $decimales = 0): string
    {
        return '$ ' . number_format($valor, $decimales, ',', '.') . ' M/CTE';
    }
}