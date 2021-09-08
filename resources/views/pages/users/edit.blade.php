@extends('layouts.master')

@section('title', 'Create User')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah User</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="persona_id" class="form-control-label">Trait</label>
                <select name="persona_id" class="form-control">
                    <option selected disabled value="">Choose Your Trait</option>
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}" {{ ( $persona->id == $user->persona_id) ? 'selected' : '' }}>{{$persona->name_persona}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-control-label">Fullname</label>
                <input type="text" name="fullname" value="{{old('fullname') ? old('fullname') : $user->fullname}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="{{old('email') ? old('email') : $user->email}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label">Password</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label">Username</label>
                <input type="text" name="username" value="{{old('username') ? old('username') : $user->username}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="gender" class="form-control-label">Gender</label>
                <select name='gender' class="form-control">
                    <option value="male" @if ( $user->gender == 'male') selected="selected" @endif>Male</option>
                    <option value="female" @if ( $user->gender == 'female') selected="selected" @endif>Female</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="age" class="form-control-label">Age</label>
                <input type="number" min="15" max="100" name="age" value="{{old('age') ? old('age') : $user->age}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="interest" class="form-control-label">Interest</label>
                <select id='mySelect' class="form-control" multiple name="interest[]">
                    <option disabled value="">Choose Your Interests</option>
                        @foreach ($interests as $interest)
                            <option value="{{$interest->id}}">{{ucfirst($interest->title)}}</option>
                        @endforeach 
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Ubah User</button>
            </div>
        </form>
    </div>
</div>
@endsection
