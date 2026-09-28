<?php

namespace App\Helpers;

class CacheKeyGeneratorHelper
{

    public static function generateCacheKey(string $prefix, array $params)
    {
        if ($params['search'] === '') {
            unset($params['search']);
        }

        return $prefix . ":" . http_build_query($params);
    }

    public static function getListParams(): array
    {
        $allowedSortParams = ['name', 'created_at'];

        $search = strtolower(request()->input('search', ''));
        $page = intval(request()->input('page', 1));
        $sort = request()->input('sort', 'name');

        if (!in_array($sort, $allowedSortParams, true)) {
            $sort = 'name';
        }

        return [
            'search' => $search,
            'page' => $page,
            'sort' => $sort,
        ];
    }
}
