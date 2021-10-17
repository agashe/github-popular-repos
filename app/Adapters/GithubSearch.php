<?php

namespace App\Adapters;

use App\Adapters\GithubSearchInterface;
use Illuminate\Support\Facades\Http;

class GithubSearch implements GithubSearchInterface
{
    /**
     * Fetch repositories from github public APIs.
     * 
     * @param array $filters
     * @return array
     */
    public function search($filters)
    {
        $search = '?q=created:>'.(!empty($filters['date']) ? $filters['date'] : '2021-01-01');

        if (!empty($filters['language'])) 
            $search .= '+language='.$filters['language'];

        $search .= '&page='.($filters['page'] ?? 1);
        $search .= '&per_page='.($filters['per_page'] ?? 10);
        $search .= '&sort=stars';
        $search .= '&order=desc';

        $response =  Http::get(config('services.github.repos_endpoint').$search);
        return $response->collect()['items'];
    }
}