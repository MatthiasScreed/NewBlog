<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => \App\Models\Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {

            // Création de la catégorie
            $category = Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
            ]);

        // Redirection vers la vue de la catégorie ou toute autre action que vous souhaitez effectuer après la création
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');

    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        // Validation des données du formulaire

        // Mise à jour de la catégorie
        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        // Redirection vers la vue de la catégorie ou toute autre action que vous souhaitez effectuer après la mise à jour
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

}
