@extends('layouts.master')

@section('title', 'Create Quote')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Quotes</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('quote.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text" class="form-control-label">Quotes</label>
                <input type="text" name="text" value="{{old('text')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="writer" class="form-control-label">Penulis</label>
                <input type="text" name="writer" value="{{old('writer')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Quotes</button>
            </div>
        </form>
    </div>
</div>
@endsection
