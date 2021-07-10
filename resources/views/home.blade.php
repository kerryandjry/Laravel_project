@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>書名</th>
                            <th>價格</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
{{--                                <td class="table-text">--}}
{{--                                    <div class="">{{ $book->book_name }}</div>--}}
{{--                                </td>--}}
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->book_name }}</td>
                                <td>{{ $book->price }}</td>
                                <td><a href="" class="btn btn-danger">選擇</a></td>
                                <td><a href="" class="btn btn-info">刪除</a></td>
{{--                                <td>--}}
{{--                                    <form action="" method="POST" class="form-inline">--}}
{{--                                        <button type="submit" class="btn btn-success">--}}
{{--                                            <i class="fa fa-check"></i>選擇--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                    <form action="" method="POST" class="form-inline">--}}
{{--                                        <button type="submit" class="btn btn-success">--}}
{{--                                            <i class="fa fa-check"></i>刪除--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('You are logged in!') }}
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
