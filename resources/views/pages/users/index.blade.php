@extends('layouts.master')

@section('title', 'List Users')

@section('content')
<div class="orders">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar User</h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Trait</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Interest</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($users as $user)
                                <td>{{$user->id}}</td>
                                <td>{{$user->persona->name_persona}}</td>
                                <td>{{$user->fullname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->age}}</td>
                                <td>
                                <?php $myinterests = explode(',', $user->interest);?>
                                <ul>
                                        @foreach ($myinterests as $interest)
                                           @foreach ($interests as $a)
                                               @if($a['id'] == $interest)
                                                   <li>{{$interests[$interest-1]['title']}}</li>
                                               @endif
                                           @endforeach 
                                        @endforeach
                                </ul>
                                </td>

                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('user.destroy', $user->id)}}" method="post" class="d-inline">
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
                                    <td collspan="9" class="text-center p-5">
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