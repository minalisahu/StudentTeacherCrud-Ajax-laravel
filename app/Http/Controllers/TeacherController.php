<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $data = $request->validated();

        $teacher_image = $request->file('image');
        $gen_name = hexdec(uniqid()) . '.' . $teacher_image->getClientOriginalExtension();
        Image::make($teacher_image)->resize(300, 300)->save('image/teacher/' . $gen_name);
        $last_image = 'image/teacher/' . $gen_name;

        Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'subject' => $request->subject,
            'image' => $last_image,
        ]);
        return Redirect()->route('teacher.list')->with('success_message', 'Successfully Added !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->validated();

        if ($request->image) {

            $teacher_image = $request->file('image');
            $gen_name = hexdec(uniqid()) . '.' . $teacher_image->getClientOriginalExtension();
            Image::make($teacher_image)->resize(300, 300)->save('image/teacher/' . $gen_name);
            $last_image = 'image/teacher/' . $gen_name;

            $old_Image = $request->image;
            unlink($old_Image);

            $teacher->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'subject' => $request->subject,
                'image' => $last_image,
            ]);
        } else {
            $teacher->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'subject' => $request->subject,
            ]);
            return Redirect()->route('teacher.list')->with('success_message', 'Successfully Updated !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->delete()) {
            return Redirect()->route('teacher.list')->with('success_message', 'Deleted Successfully !!');
        }
    }
}
