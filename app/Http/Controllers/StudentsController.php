<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentsController extends Controller
{
    public function index() {
        $students = Students::get();
        return view('students.liststudents', ['students' => $students]);
    }

    public function new () {
        return view('students.form');
    }

    public function add (Request $request) {
        $students = new Students;
        $students = $students->create($request -> all());
        return Redirect::to('/students');
    }

    public function edit($id) {
        $students = Students::findOrFail($id);
        return view('students.form', ['students' => $students]);
    }

    public function update(Request $request, $id) {
        $students = Students::findOrFail($id);
        $students->update($request -> all());
        return Redirect::to('/students');
    }

    public function delete($id) {
        $students = Students::findOrFail($id);
        $students->delete();
        return Redirect::to('/students');
    }
}
