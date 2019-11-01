@extends('admins.layouts.app')

@section('content')
    @if($totalPinnedCategories > 0)
        <div class="row clearfix ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Pinned categories</h2>
                        <h5>Total pinned categories: {{$totalPinnedCategories}} </h5>
                    </div>

                    <div class="body table-responsive">
                        @include('admins.pages.categories.partials.table', [
                        'categories' => $pinnedCategories,
                        'type' => 'pinned',
                        ])
                    </div>

                </div>
            </div>
        </div>
    @endif

    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Categories</h2>
                    <h5>Total Categories: {{$totalCategories}} </h5>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-success">New</a>
                </div>

                <div class="body table-responsive">
                    {{ $categories->links() }}

                    @include('admins.pages.categories.partials.table', [
                    'categories' => $categories,
                    'type' => 'all',

                    ])

                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
