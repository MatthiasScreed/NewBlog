<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories'), // Assure que le nom de la catégorie est unique dans la table des catégories
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories'),
            ]
        ]);

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

    public function update(Request $request, Category $category)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories'), // Assure que le nom de la catégorie est unique dans la table des catégories
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories'),
            ]
        ]);

        // Mise à jour de la catégorie
        $category->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        // Redirection vers la vue de la catégorie ou toute autre action que vous souhaitez effectuer après la mise à jour
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

}
