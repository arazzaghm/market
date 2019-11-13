@extends('layouts.app')

@section('content')
    @can('clearCart', auth()->user())
        <form action="{{route('cart.clear')}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                <i class="fa fa-trash"></i>
                Clear cart
            </button>
        </form>
    @endcan
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Remove</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="col">{{$post->title}}</th>
                <th scope="col">{{$post->price}}</th>
                <th scope="col">Amount</th>
                <th scope="col">
                    <form action="{{route('cart.delete', ['post' => $post])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="fa fa-minus"></i>
                        </button>
                    </form>
                </th>
            </tr>
        @empty
            Your cart is empty.
        @endforelse

        </tbody>
    </table>
@endsection
