@extends('layouts.app')

@section('content')
    <h2>Popular questions</h2>
    {{$popularQuestions->links()}}
    <div class="row">
        @foreach($popularQuestions as $popularQuestion)
            @if($loop->even)
                <div class="col-4 mt-2">
                    <div class="accordion" id="accordionExample">
                        <div class="card border-bottom">
                            <div class="card-header" id="heading{{$popularQuestion->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-dark" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapse{{$popularQuestion->id}}"
                                            aria-controls="collapse{{$popularQuestion->id}}">
                                        {{$popularQuestion->title}}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$popularQuestion->id}}" class="collapse"
                                 aria-labelledby="heading{{$popularQuestion->id}}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$popularQuestion->text}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @foreach($popularQuestions as $popularQuestion)
            @if($loop->odd)
                <div class="col-4 mt-2">
                    <div class="accordion" id="accordionExample">
                        <div class="card border-bottom">
                            <div class="card-header" id="heading{{$popularQuestion->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-dark" type="button" data-toggle="collapse"
                                            data-target="#collapse{{$popularQuestion->id}}"
                                            aria-controls="collapse{{$popularQuestion->id}}">
                                        {{$popularQuestion->title}}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$popularQuestion->id}}" class="collapse"
                                 aria-labelledby="heading{{$popularQuestion->id}}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    {{$popularQuestion->text}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
