@extends('layouts.master')

@section('title', 'List Target')

@section('content')
<div class="orders">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar Target</h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id User</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($target as $target)
                            <tr>
                                    <td>{{$target->user_id}}</td>
                                    <td>{{$target->title}}</td>
                                    <td>{{$target->desc}}</td>
                                    <td>{{$target->status}}</td>
                                    <td>{{$target->type}}</td>
                                    <td>
                                        <a href="{{route('target.edit', $target->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('target.destroy', $target->id)}}" method="post" class="d-inline">
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