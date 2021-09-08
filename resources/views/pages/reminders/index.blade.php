@extends('layouts.master')

@section('title', 'List Reminders')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Reminders</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Remind Url</th>
                                    <th>Pushtime</th>
                                    <th>Type</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($reminders as $reminder)
                            <tr>
                                <td>{{$reminder->id}}</td>
                                <td>{{$reminder->title}}</td>
                                <td><a href="{{$reminder->remind_url}}">Link</a></td>
                                <td>{{$reminder->pushtime}}</td>
                                <td>{{$reminder->type}}</td>
                                <td>{{$reminder->desc}}</td>
                                <td>
                                        <a href="{{route('reminder.edit', $reminder->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{route('reminder.destroy', $reminder->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-5">
                                    Data tidak tersedia
                                </td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection