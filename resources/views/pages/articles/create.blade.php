@extends('layouts.master')

@section('title', 'Create Article')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Artikel</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="headline" class="form-control-label">Headline</label>
                <input type="text" name="headline" value="{{old('headline')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="news_url" class="form-control-label">URL Artikel</label>
                <input type="text" name="news_url" value="{{old('news_url')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="image_url" class="form-control-label">Foto Artikel</label>
                <input type="file" name="image_url" value="{{old('image_url')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Tipe Artikel</label>
                <select name='type' class="form-control">
                    <option selected disabled value="">Select Article's Type</option>
                    <option value="news">News</option>
                </select>
            </div>
            <div class="form-group">
                <label for="interest_id" class="form-control-label">Interest</label>
                <select class="form-control" name="interest_id">
                    <option disabled value="">Choose Your Interests</option>
                        @foreach ($interests as $interest)
                            <option value="{{$interest->id}}">{{ucfirst($interest->title)}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Artikel</button>
            </div>
        </form>
    </div>
</div>
@endsection
