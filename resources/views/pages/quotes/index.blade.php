@extends('layouts.master')

@section('title', 'List Quotes')

@section('content')
<div class="orders">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar Quotes</h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Text Quotes</th>
                                <th>Penulis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotes as $quote)
                            <tr>
                                    <td>{{$quote->id}}</td>
                                    <td>{{$quote->text}}</td>
                                    <td>{{$quote->writer}}</td>
                                    <td>
                                        <a href="{{route('quote.edit', $quote->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('quote.destroy', $quote->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection