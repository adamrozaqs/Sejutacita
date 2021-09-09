@extends('layouts.master')

@section('title', 'Create User')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah User</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="id" value="id" class="form-control" required/> --}}
            <div class="form-group">
                <label for="fullname" class="form-control-label">Fullname</label>
                <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label">Password</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label">Username</label>
                <input type="text" name="username" value="{{old('username')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="gender" class="form-control-label">Gender</label>
                <select name='gender' class="form-control" required>
                    <option selected disabled value="">Choose Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age" class="form-control-label">Age</label>
                <input type="number" min="15" max="100" name="age" value="{{old('age')}}" class="form-control" required/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah User</button>
            </div>
        </form>
    </div>
</div>
@endsection
