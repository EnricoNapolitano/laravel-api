<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('updated_at', 'DESC')->get();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'label'=> 'required|string|unique:types|min:3|max:40',
            'class_icon'=> 'string|nullable',
        ],
        [
            'label.required'=>'Label is required.',
            'label.unique'=>'This label has already been used. Label name has to be unique.',
            'label.min' => 'Label needs at least 3 characters.',
            'label.max' => 'Label accepts maximum 40 charcters.',
            'class_icon.string'=> 'CSS Class needs to be a string of characters',
        ]);

        $data = $request->all();
        $type = new Type();
        $type -> fill($data);
        $type -> save();

        return to_route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //in this case, there's no need of this method
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request -> validate([
            'label'=> ['required','string', Rule::unique('types')->ignore($type->id),'min:3','max:40'],
            'class_icon'=> 'string|nullable',
        ],
        [
            'label.required'=>'Label is required.',
            'label.unique'=>'This label has already been used. Label name has to be unique.',
            'label.min' => 'Label needs at least 3 characters.',
            'label.max' => 'Label accepts maximum 40 charcters.',
            'class_icon.string'=> 'CSS Class needs to be a string of characters',
        ]);

        $data = $request->all();
        $type -> update($data);

        return to_route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index');
    }
}
