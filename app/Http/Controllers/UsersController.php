<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function show()
    {
        $data = [
            'users' => User::with('category')->get(),
        ];

        return view('users.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'categories' => $this->getCategoriesSelect(),
        ];

        return view('users.create', compact('data'));
    }

    public function store(UserRequest $request)
    {
        $inputs          = $request->except(['_token']);
        $inputs['password'] = bcrypt($inputs['password']);

        $created         = User::create($inputs);

        if ($created) {
            Session::flash('success-feedback', 'Registro salvo com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao salvar o registro!');
        }

        return Redirect::route('users.show');
    }

    public function edit(User $user)
    {
        $data = [
            'user'            => $user,
            'categories' => $this->getCategoriesSelect(),
        ];

        return view('users.edit', compact('data'));
    }

    public function update(User $user, Request $request)
    {
        $inputs          = $request->except(['_method', '_token']);
        $inputs['password'] = bcrypt($inputs['password']);
        $updated         = $user->update($inputs);

        if ($updated) {
            Session::flash('success-feedback', 'Registro atualizado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao atualizar o registro!');
        }

        return Redirect::route('users.show');
    }

    public function delete(User $user)
    {
        $deleted = $user->delete();

        if ($deleted) {
            Session::flash('success-feedback', 'Registro deletado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao deletar o registro!');
        }

        return Redirect::route('users.show');
    }

    public function getCategoriesSelect()
    {
        $categories = Category::all();

        $return[] = 'Escolha uma opção';

        foreach ($categories as $category) {
            $return[$category->id] = $category->name;
        }

        return $return;
    }

}
