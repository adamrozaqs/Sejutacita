@extends('layouts.master')

@section('title', 'Edit Target')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Target</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('target.update', $target->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id" class="form-control-label">User ID</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ ( $user->id == $user->id) ? 'selected' : '' }}>{{$user->fullname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title" class="form-control-label">Title</label>
                <input type="title" name="title" value="{{old('title') ? old('title') : $target->title}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="desc" class="form-control-label">Detail</label>
                <input type="desc" name="desc" value="{{old('desc') ? old('desc') : $target->desc}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="status" class="form-control-label">Status</label>
                <select name='status' class="form-control" required>
                    <option value="0" @if ($target->status == '0') selected="selected" @endif>True</option>
                    <option value="1" @if ($target->status == '1') selected="selected" @endif>False</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <select name='type' class="form-control" required>
                    <option value="task"" @if ($target->type == 'task') selected="selected" @endif>Task</option>
                    <option value="achieve" @if ($target->type == 'achieve') selected="selected" @endif>Achieve</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Update Target</button>
            </div>
        </form>
    </div>
</div>
@endsection
