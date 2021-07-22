@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td><a href="./user/search" class="btn btn-danger">公車查詢</a>
                        </tr>
                        <tr>
                            <th>書名</th>
                            <th>價格</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->book_name }}</td>
                                <td>{{ $book->price }}</td>
                                <td><a href="./user/buy/{{$book->id}}" class="btn btn-danger">購買</a>
                            </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
