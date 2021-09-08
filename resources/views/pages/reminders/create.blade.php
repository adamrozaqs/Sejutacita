@extends('layouts.master')

@section('title', 'Create Reminder')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Reminder</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('reminder.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-control-label">Title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="desc" class="form-control-label">Description</label>
                <input type="text" name="desc" value="{{old('desc')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="image_url" class="form-control-label">Foto Artikel</label>
                <input type="file" name="image_url" value="{{old('image_url')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label" for="time">Select Time</label>
                    <input type="time" id="time" name="pushtime" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <input type="text" name="type" value="{{old('type')}}" class="form-control" required/>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Reminder</button>
            </div>
        </form>
    </div>
</div>
@endsection
