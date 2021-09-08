@extends('layouts.master')

@section('title', 'Create Quote')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Quotes</strong>
        <small>{{$quote->text}}</small>
    </div>
    <div class="card-body card-block">
    <form action="{{ route('quote.update', $quote->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="text" class="form-control-label">Text Quotes</label>
                <input type="text" name="text" value="{{old('text') ? old('text') : $quote->text}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="writer" class="form-control-label">Penulis</label>
                <input type="text" name="writer" value="{{old('writer') ? old('writer') : $quote->writer}}" class="form-control"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Ubah Quotes</button>
            </div>
        </form>
    </div>
</div>
@endsection
