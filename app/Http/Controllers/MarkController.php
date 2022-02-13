<?php

/**
 * @author    Linju Jayaprakash <linjujp@gmail.com>
 * @license   @linju
 * @copyright 2022, Linju Jayaprakash
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentMark;
use App\Models\Student;

/**
 * Class MarkController
 * @package App\Http\Controllers
 */

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = StudentMark::all();
        return view('mark-index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::pluck('name', 'id');
        return view('mark-create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required',
            'term' => 'required',
            'maths' => 'required|numeric',
            'history' => 'required|numeric',
            'science' => 'required|numeric',
        ]);
        $student = StudentMark::create($data);
        return redirect('/marks')->with('completed', 'Student marks has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marks = StudentMark::findOrFail($id);
        $students = Student::pluck('name', 'id');
        return view('mark-edit', compact('marks','students'));
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
        $updateData = $request->validate([
            'student_id' => 'required',
            'term' => 'required',
            'maths' => 'required|numeric',
            'history' => 'required|numeric',
            'science' => 'required|numeric',
        ]);
        StudentMark::whereId($id)->update($updateData);
        return redirect('/marks')->with('completed', 'Student marks has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = StudentMark::findOrFail($id);
        $student->delete();
        return redirect('/marks')->with('completed', 'Student marks has been deleted');
    }
}
