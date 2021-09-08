@extends('layouts.master')

@section('title', 'List Article')

@section('content')
<div class="orders">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar Artikel</h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Interest Id</th>
                                <th>Headline</th>
                                <th>URL</th>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>
                                    <?php $myinterests = explode(',', $article->interest_id);?>
                                    <ul>
                                            @foreach ($myinterests as $interest)
                                               @foreach ($interests as $a)
                                                   @if($a['id'] == $interest)
                                                       {{$interests[$interest-1]['title']}}
                                                   @endif
                                               @endforeach 
                                            @endforeach
                                    </ul>
                                </td>
                                <td>{{$article->headline}}</td>
                                <td><a href="{{$article->news_url}}">Link</a></td>
                                <td>
                                    <img src="{{asset($article->image_url)}}" style="width: 150px" class="img-thumbnail" />
                                </td>
                                <td>{{$article->type}}</td>
                                <td>
                                    <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('article.destroy', $article->id)}}" method="post" class="d-inline">
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