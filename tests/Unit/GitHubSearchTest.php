<?php

namespace Tests\Unit;

use Tests\TestCase;

class GitHubSearchTest extends TestCase
{
    /**
     * @var GithubSearchInterface $githubSearch 
     */
    private $githubSearch;
    
    /**
     * GitHubSearchTest Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->githubSearch = new \App\Adapters\GithubSearch();
    }

    /**
     * Test github search adapter.
     *
     * @return void
     */
    public function testSearch()
    {
        $this->assertEquals(10, count($this->githubSearch->search([])));
    }
}
