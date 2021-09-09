<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.users.index')->with([
            'users' => $users

        ]);
    }

    public function api_store(Request $request)
    {
        $tableName = "users";
        $result = DB::insert(
            'insert into users (id,fullname,username,gender,age,email,password) values (?,?,?,?,?,?,?)',
            [$request->input("id"), $request->input("fullname"), $request->input("username"), $request->input("gender"), $request->input("age"),  $request->input("email"), bcrypt($request->input("password"))]
        );

        return response([
            'message' => 'Data Berhasil Ditambahkan',
            'status' => true,
            'code' => Response::HTTP_CREATED,
            'data' => $result
        ], 201);
    }

    public function create()
    {
        $users = User::all();

        return view('pages.users.create')->with([
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make('password', ['rounds' => 12]);

        User::create($data);
        return redirect()->route('user.index');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $users = User::all();
        $user = User::findOrFail($id);
        return view('pages.users.edit')->with([
            'user' => $user,
            'users' => $users
        ]);
    }

    public function api_update(Request $request, $id)
    {
        $fullname = $request->fullname;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $gender = $request->gender;
        $age = $request->age;

        $request->getContent();
        $user = User::findOrFail($id);
        if ($fullname !== null) {
            $user->fullname = $fullname;
        }
        if ($username !== null) {
            $user->username = $username;
        }
        if ($email !== null) {
            $user->email = $email;
        }
        if ($password !== null) {
            $user->password = $password;
        }
        if ($gender !== null) {
            $user->gender = $gender;
        }
        if ($age !== null) {
            $user->age = $age;
        }
        $user->save();

        return response([
            'message' => 'Data Berhasil Diedit',
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'data' => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
