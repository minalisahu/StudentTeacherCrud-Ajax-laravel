<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('student.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        $teacher_image = $request->file('image');
        $gen_name = hexdec(uniqid()) . '.' . $teacher_image->getClientOriginalExtension();
        Image::make($teacher_image)->resize(300, 300)->save('image/teacher/' . $gen_name);
        $last_image = 'image/teacher/' . $gen_name;

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'teacher_id' => $request->teacher_id,
            'subject' => $request->subject,
            'image' => $last_image,
        ]);
        return Redirect()->route('student.list')->with('success_message', 'Successfully Added !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::get();
        return view('student.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validated();

        if ($request->image) {

            $teacher_image = $request->file('image');
            $gen_name = hexdec(uniqid()) . '.' . $teacher_image->getClientOriginalExtension();
            Image::make($teacher_image)->resize(300, 300)->save('image/teacher/' . $gen_name);
            $last_image = 'image/teacher/' . $gen_name;

            $old_Image = $request->image;
            unlink($old_Image);

            $student->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'teacher_id' => $request->teacher_id,
                'subject' => $request->subject,
                'image' => $last_image,
            ]);
        } else {
            $student->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'teacher_id' => $request->teacher_id,
                'subject' => $request->subject,
            ]);
            return Redirect()->route('student.list')->with('success_message', 'Successfully Updated !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->delete()) {
            return Redirect()->route('student.list')->with('success_message', 'Deleted Successfully !!');
        }
    }
}
