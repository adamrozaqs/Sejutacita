<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Target;
use App\Http\Requests\TargetRequest;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response;

class TargetController extends Controller
{
    public function index()
    {
        $target = Target::with(['user'])->get();
        $users = User::all();

        return view('pages.target.index')->with([
            'users' => $users,
            'target' => $target

        ]);
    }


    public function create()
    {
        $users = User::all();
        $target = Target::all();

        return view('pages.target.create')->with([
            'users' => $users,
            'target' => $target
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        Target::create($data);
        return redirect()->route('target.index');
    }

    public function api_store(Request $request)
    {
        $date = new DateTime();
        $target = new Target;
        $target->user_id = $request->uuid;
        $target->title = $request->title;
        $target->desc = $request->desc;
        $target->status = $request->status === true ? 1 : 0;
        $target->type = 'task';
        $target->finish_at = $request->finish_at;
        $target->created_at = $request->created_at;
        $target->updated_at = $date->format('Y-m-d H:i:s');
        $target->save();
        return response([
            'message' => 'Data Berhasil Ditambahkan',
            'status' => true,
            'code' => Response::HTTP_CREATED,
            'data' => $target
        ], 201);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $users = User::all();
        $target = Target::findOrFail($id);

        return view('pages.target.edit')->with([
            'target' => $target,
            'users' => $users
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $target = Target::findOrFail($id);
        $target->update($data);

        return redirect()->route('target.index');
    }

    public function api_update(Request $request, $id)
    {
        $date = new DateTime();
        $target = Target::findOrFail($id);
        if ($request->title !== null) {
            $target->title = $request->title;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        if ($request->desc !== null) {
            $target->desc = $request->desc;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        if ($request->status !== null) {
            $target->status = $request->status === true ? 1 : 0;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        if ($request->finish_at !== null) {
            $target->finish_at = $request->finish_at;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        if ($request->created_at !== null) {
            $target->created_at = $request->created_at;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        if ($request->deleted_at !== null) {
            $target->deleted_at = $request->deleted_at;
            $target->updated_at = $date->format('Y-m-d H:i:s');
        }
        $target->save();

        return response([
            'message' => 'Data Berhasil Diubah',
            'status' => true,
            'code' => Response::HTTP_OK,
            'data' => $target
        ], 200);
    }

    public function destroy($id)
    {
        $target = Target::findOrFail($id);
        $target->delete();

        return redirect()->route('target.index');
    }
    public function api_delete($id)
    {
        $target = Target::findOrFail($id);
        $target->delete();

        return response([
            'message' => 'Target Berhasil Dihapus',
            'status' => true,
            'code' => Response::HTTP_NO_CONTENT,
            'data' => $target
        ]);
    }
}
