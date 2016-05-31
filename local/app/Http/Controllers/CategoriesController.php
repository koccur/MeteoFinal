<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
//        return \Auth::user();/*sprawdzenie uzytkownika ktory zalogowany */
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function create(Request $request)
    {
        if ($request->user()->can('can_create')) {
            return view('categories.create');
        } else {
            return redirect('/')->withErrors("Brak Ci uprawnieñ cz³eniu");
        }
    }

    public function store(Requests\CreateCategoryRequest $request)
    {
        $category = new Category($request->all());
        $category->save();
        return redirect('categories');

    }

    public
    function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public
    function update($id, Requests\CreateCategoryRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('categories');
    }
}
