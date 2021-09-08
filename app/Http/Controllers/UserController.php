<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Persona;
use App\Models\Interest;
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
        $users = User::with(['persona'])->get();
        $personas = Persona::all();
        $interests = Interest::all();

        return view('pages.users.index')->with([
            'users' => $users,
            'personas' => $personas,
            'interests' => $interests
        ]);
    }

    public function api_store(Request $request)
    {
        $tableName = "users";
        $result = DB::insert(
            'insert into users (id,persona_id,fullname,username,gender,age,interest,email,password) values (?,?,?,?,?,?,?,?,?)',
            [$request->input("id"),$request->input("persona_id"), $request->input("fullname"), $request->input("username"), $request->input("gender"), $request->input("age"), $request->input("interest"), $request->input("email"), bcrypt($request->input("password"))]
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

        $personas = Persona::all();
        $interests = Interest::all();

        return view('pages.users.create')->with([
            'users' => $users,
            'personas' => $personas,
            'interests' => $interests
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['interest'] = implode(",", $data['interest']);
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
        // $userint = explode(',', $user->interest);
        $personas = Persona::all();
        $interests = Interest::all();

        // dd($userint);
        // dd($user->interest);
        return view('pages.users.edit')->with([
            'user' => $user,
            'users' => $users,
            // 'userint' => $userint,
            // 'interestUid' => $interestUid,
            'personas' => $personas,
            'interests' => $interests
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
        $interest = $request->interest;
        $persona_id = $request->persona_id;

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
        if ($interest !== null) {
            $user->interest = $interest;
        }
        if ($persona_id !== null) {
            $user->persona_id = $persona_id;
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
        $data['interest'] = implode(",", $data['interest']);

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
