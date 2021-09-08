@extends('layouts.master')

@section('title', 'Create Interest')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Interest</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('interest.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-control-label">Title Interest</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control" required/>
            </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah User</button>
            </div>
        </form>
    </div>
</div>
@endsection
