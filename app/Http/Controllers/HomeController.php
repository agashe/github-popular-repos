<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Adapters\GithubSearchInterface;

class HomeController extends Controller
{
    /**
     * @var GithubSearchInterface $githubSearch 
     */
    private $githubSearch;

    /**
     * HomeController Constructor
     */
    public function __construct(GithubSearchInterface $githubSearch)
    {
        $this->githubSearch = $githubSearch;
    }
    
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {        
        return view('index', [
            'page' => ($request->page) ?? 1,
            'repositories' => $this->githubSearch->search([
                'date' => $request->date,
                'language' => $request->language,
                'per_page' => $request->per_page,
                'page' => $request->page,
            ])
        ]);
    }
}
