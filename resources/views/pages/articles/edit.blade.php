@extends('layouts.master')

@section('title', 'Create Article')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Artikel</strong>
        <small>{{$article->headline}}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="headline" class="form-control-label">Headline</label>
                <input type="text" name="headline" value="{{old('headline') ? old('headline') : $article->headline}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="news_url" class="form-control-label">URL Artikel</label>
                <input type="text" name="news_url" value="{{old('news_url') ? old('news_url') : $article->news_url}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="image_url" class="form-control-label">Foto Artikel</label>
                <input type="file" name="image_url" value="{{old('image_url') ? old('image_url') : $article->image_url}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Tipe Artikel</label>
                <select name="type" class="form-control" id="type">
                    <option value="news" @if ($article->type == 'news') selected="selected" @endif>News</option>
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
                <button class="btn btn-primary btn-block" type="submit">Ubah Artikel</button>
            </div>
        </form>
    </div>
</div>
@endsection
