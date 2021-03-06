<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * index se usa para mostrar todos los ToDos
     * store para guardar un ToDo
     * update para actualizar un ToDo
     * destroy para eliminar un ToDo
     * edit para mostrar el formulario de edición
    */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3',
            'category_id'=> 'required'
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('Todos')->with('success', 'Tarea creada correctamente');
    }

    public function index() {
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', ['todos' => $todos, 'categories'=> $categories]);
    }

    public function show($id) {
        $todo = Todo::find($id);
        return view('show', ['todo' => $todo]);
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        /* la función dd() se puede usar para debuguear variables
        dd($todo);
        */
        return redirect()->route('Todos')->with('success', 'Tarea actualizada');
    }

    public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('Todos')->with('success', 'Tarea ha sido eliminada');
    }

}
