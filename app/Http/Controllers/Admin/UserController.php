<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckIfIsAdmin;



class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdm()) {
            $users = User::paginate(20);
        } else {
            $authenticatedEmail = $user->email;
            $users = User::where('email', $authenticatedEmail)->paginate(20);
        }

        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
       User::create($request->validated());

       return redirect()->route('users.index')->with('success','Usuário Criado com Sucesso!!');
    }

    public function edit(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        return view ('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
    }
        $data = $request->only('name','email');
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

    $user->update($data);

    return redirect()->route('users.index')->with('success','Usuário Editado com Sucesso!!');
    }
    public function show(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
    }

    return view ('admin.users.show', compact('user'));
    }

    public function destroy(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
    }

    $user->delete();

    return redirect()->route('users.index')->with('success','Usuário Deletado com Sucesso!!');
    }

}
