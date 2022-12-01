<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    function __construnct()
    {
        $this->middleware('permission:ver-user|crear-user|editar-rol|borrar-user', ['only' => ['index']]);
        $this->middleware('permission:crear-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-user', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ususarios = User::paginate(5);

        return view('usuarios.index', ['usuarios' => $ususarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =  Role::pluck('name', 'name')->all();
        return view('usuarios.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ]);


            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
        } catch (\Throwable $th) {

            return back()->with('error', '¡Ocurrio un error al intentar guardar!');
        }



        return redirect()->route('usuarios.index')->with('error', '¡Usuario  creado con éxito!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usuarios.editar', ['user' => $user, 'roles' => $roles, 'userRole' => $userRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        try {

            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')
                ->where('model_id', $id)
                ->delete();

            $user->assignRole($request->input('roles'));
        } catch (\Throwable $th) {
            return back()->with('error', '¡Ocurrio un error al actualizar!');
        }


        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            User::find($id)->delete();
        } catch (\Throwable $th) {
            return back()->with('error', '¡Ocurrio un error al eliminar!');
        }

        return redirect()->route('usuarios.index');
    }
}
