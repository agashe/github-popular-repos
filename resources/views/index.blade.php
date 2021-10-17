@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto py-3">
            <div class="row">
                <h4 class="w-50">{{ __('Popular Repositories') }}</h4>

                <p class="text-end d-inline w-50">
                    <a type="button" class="btn btn-primary" title="{{ __('Prev') }}"
                        @if ($page == 1)
                            disabled
                        @else
                            href="{{ route('index', ['page' => ($page - 1)]) }}" 
                        @endif
                    >
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    
                    <a href="{{ route('index', ['page' => ($page + 1)]) }}" 
                        class="btn btn-primary" title="{{ __('Next') }}">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </p>
            </div>
            <div class="row">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-select" name="language">
                                <option selected>{{ __('Programming Language') }}</option>
                                <option value="assembly">Assembly</option>
                                <option value="c">C</option>
                                <option value="c++">C++</option>
                                <option value="php">PHP</option>
                                <option value="java">Java</option>
                                <option value="python">Python</option>
                                <option value="ruby">Ruby</option>
                                <option value="c#">C#</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date" title="{{ __('Created At') }}">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="per_page">
                                <option value="10">{{ __('Show 10 results per page') }}</option>
                                <option value="50">{{ __('Show 50 results per page') }}</option>
                                <option value="100">{{ __('Show 100 results per page') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100" title="{{ __('Search') }}">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div class="row py-2">
                @foreach ($repositories as $repository)
                    <div class="col-md-12 mb-4">
                        <div class="card text-start">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fa fa-sm fa-book"></i>

                                    <a href="{{ $repository['owner']['html_url'] }}" target="_blank">
                                        {{ $repository['owner']['login'] }}
                                    </a>
                                    /
                                    <a href="{{ $repository['html_url'] }}" target="_blank">
                                        {{ $repository['name'] }}
                                    </a>
                                </h4>
                                <article>
                                    {{ substr($repository['description'], 0, 250) }}
                                </article>
                                <a class="btn btn-success btn-sm">
                                    <i class="fa fa-star"></i>
                                    {{ humanReadableNumber($repository['stargazers_count']) }}
                                </a>
                                <a href="{{ $repository['html_url'] }}" target="_blank"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-rocket"></i>
                                    {{ __('Go To Repo') }}
                                </a>
                            </div>
                            <div class="card-footer">
                                @if (!empty($repository['topics']))
                                    @foreach ($repository['topics'] as $topic)
                                        <button type="button" class="btn btn-outline-info btn-sm m-1">
                                            {{ $topic }}
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection