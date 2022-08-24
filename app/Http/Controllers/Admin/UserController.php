<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        $users= User::all();

        return view("admin.users.index", compact("users"));
    }

    public function edit ($id) {

        $user= User::findOrFail($id);

        return view("admin.users.edit", compact("user"));
    }
    public function update (Request $request, $id) {

        $data = $request->all();
        $user = User::findOrFail($id);

        // può capitare che nella seconda tabella non ci sia ancora nessuna informazione
        // sull'utente indicato.
        // In questo caso dobbiamo crearli noi manualmente, come se stessimo facendo il CREATE
        if (!$user->details) {
            $user->details = new UserDetail();

            $user->details->user_id = $user->id;
            $user->details->fill($data);
            $user->details->save();

            /* $user->details = UserDetail::create([
                "user_id" => $user->id,
                ...$data
            ]); */
        } else {
            $user->details->update($data);
        }

        /* $user->details->address = $data["address"];
        $user->details->city = $data["city"];
        $user->details->province = $data["province"];
        $user->details->phone = $data["phone"]; */

        $user->update($data);

        return redirect()->route("admin.users.edit", $user->id);
    }

    public function show ($id) {

        $user= User::findOrFail($id);

        return view("admin.users.show", compact("user"));
    }
}
