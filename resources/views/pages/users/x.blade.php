@extends('layouts.master')

@section('title', 'Update User')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah User</strong>
        <small>{{$user->fullname}}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
            {{-- @method('POST') --}}
            @csrf
            <input type="hidden" value="{{$user->id}}">
            <div class="form-group">
                <label for="fullname" class="form-control-label">Fullname</label>
                <input type="text" name="fullname" value="{{old('fullname') ? old('fullname') : $user->fullname}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="{{old('email') ? old('email') : $user->email}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label">Password</label>
                <input type="password" name="password" value="{{old('password') ? old('password') : $user->password}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label">Username</label>
                <input type="text" name="username" value="{{old('username') ? old('username') : $user->username}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="gender" class="form-control-label">Gender</label>
                <select name='gender' class="form-control" required>
                    <option value="{{$user->gender}}">Don't Change the Value</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age" class="form-control-label">Age</label>
                <input type="number" min="15" max="100" name="age" value="{{old('age') ? old('age') : $user->age}}" class="form-control" required/>
            </div>
            {{-- <div class="form-group">
                <label for="interest" class="form-control-label">Interest</label>
                <select id='selectEvents' class="form-control custom-select" multiple name="interest[]">
                    <option disabled value="{{$user->interest}}">Choose Your Interests</option>
                        @foreach ($interests as $interest)
                            @foreach ($myinterests as $myint)
                                @if ($interest->id === $myint)
                                    <option value="{{$interest->id}}" selected>{{$interest->title}}</option>
                                    @endif    
                                    @endforeach
                                    <option value="{{$interest->id}}">{{$interest->title}}</option>
                        @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah User</button>
            </div>
        </form>
    </div>
</div>
@endsection
