@extends('layouts.master')

@section('title', 'Edit Reminder')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Reminder</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('reminder.update', $reminder->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title" class="form-control-label">Title</label>
                <input type="text" name="title" value="{{old('title') ? old('title') : $reminder->title}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="desc" class="form-control-label">Description</label>
                <input type="text" name="desc" value="{{old('desc') ? old('desc') : $reminder->desc}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="remind_url" class="form-control-label">Foto Artikel</label>
                <input type="file" name="remind_url" value="{{old('remind_url') ? old('remind_url') : $reminder->remind_url}}" class="form-control"/>
            </div>
            <div class="form-group">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label" for="time">Select Time</label>
                    <input type="time" id="time" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <input type="text" name="type" value="{{old('type') ? old('type') : $reminder->type}}" class="form-control" required/>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Update Reminder</button>
            </div>
        </form>
    </div>
</div>
@endsection
