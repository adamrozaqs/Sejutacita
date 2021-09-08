@extends('layouts.master')

@section('title', 'Create Target')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Target</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('target.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id" class="form-control-label">User ID</label>
                <select name="user_id" class="form-control">
                    <option selected disabled value="">Choose Your ID</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->id}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title" class="form-control-label">Title</label>
                <input type="title" name="title" value="{{old('title')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="desc" class="form-control-label">Detail</label>
                <input type="desc" name="desc" value="{{old('desc')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="status" class="form-control-label">Status</label>
                <select name='status' class="form-control" required>
                    <option selected disabled value="">Status</option>
                    <option value="0">True</option>
                    <option value="1">False</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <select name='type' class="form-control" required>
                    <option selected disabled value="">Choose The Type</option>
                    <option value="task">Task</option>
                    <option value="achieve">Achieve</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Target</button>
            </div>
        </form>
    </div>
</div>
@endsection
