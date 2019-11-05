@extends('layouts.app')

@section('content')
    <div class="row">
        @include('pages.settings.partials.sidebar')
        <div class="col-8">
            <h2>My statistic</h2>
            <div class="row">
                <div class="col">
                    <div class="card mt-1" style="width: 18rem; height: 100%">
                        <div class="card-header">
                            Support
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Information about support</h6>
                            <p class="card-text">
                                <span class="fa fa-flag"></span>
                                Total reports: {{$totalReports}}
                            </p>
                            <p class="card-text">
                                <span class="fa fa-question"></span>
                                Total questions: {{$totalQuestions}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
