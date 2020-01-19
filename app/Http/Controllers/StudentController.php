<?php

namespace App\Http\Controllers;

use App\Student;
use App\PoliticalPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.view_students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create_students');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

            $this->validate($request, [
                'file' => 'required|file|min:0|max:20000',
            ]);

            $file_extension = $request->file('file')->getClientOriginalExtension();
            $random = Str::random(40);
            if ($request->file('file')->isValid()) {
               $path_file = $request->file('file')->storeAs('file', $random.'_'. Carbon::now()->toDateString() .'.'.$file_extension);
            }

            $count = $this->_import_csv(storage_path('app/'.$path_file));
            return back()->withStatus("{$count} Record saved successfully!");
        }
        else {
            $this->validate($request, [
                'matric_no' => 'required|string',
                'full_name' => 'required|string',
                'dues' => 'nullable|string',
                'picture_url' => 'nullable|string',
                'password' => 'nullable|string',
            ]);

            $student = [];
            $student['matric_no'] = $request->input('matric_no');
            $student['full_name'] =  $request->input('full_name');
            if ($request->has('dues')) $student['dues'] =  $request->input('dues');
            if ($request->has('picture_url')) $student['picture_url'] = $request->input('picture_url');
            if ($request->has('password')) $student['password'] = $request->input('password');

            try {
                DB::table('students')->insert($student);
            } catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == '1062'){
                    return back()->withInput()->withErrors("Student with matric no {$request->input('matric_no')} exist on the system");
                }
            }
            return back()->withStatus("Record saved successfully!");
        }

    }

    private function _import_csv($csv_path)
    {
        $query = "LOAD DATA LOCAL INFILE '". addslashes($csv_path). "' INTO TABLE students FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '|' ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES (matric_no, full_name, @created_at, @updated_at) SET created_at=NOW(), updated_at=NOW()";
        return DB::connection()->getpdo()->exec($query);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $posts = PoliticalPost::select('id','title')->get();
        return view('students.edit_student', compact(['student','posts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'matric_no' => 'required|string',
            'full_name' => 'required|string',
            'dues' => 'nullable|string',
            'picture_url' => 'nullable|string',
            'password' => 'nullable|string',
            'political_post_id' => 'nullable|string',
        ]);

        $student->update($request->all());
        return view('students.view_students')->withStatus('Record Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->destroy();
        return back()->withStatus(__('Student record has been deleted successfully'));
    }
}
