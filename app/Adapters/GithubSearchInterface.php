<?php

namespace App\Adapters;

interface GithubSearchInterface
{
    /**
     * Fetch repositories from github public APIs.
     * 
     * @param array $filters
     * @return array
     */
    public function search($filters);
}