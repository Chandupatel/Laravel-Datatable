<?php

namespace App\Http\Controllers;

use App\Models\Student;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('students.show', $row->id) . '" class="edit btn btn-success btn-sm">View</a>
                    <button class="delete btn btn-danger btn-sm row-delete-button"
                    delete-url="' . route('students.destroy', $row->id) . '"> Delete
                    </button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countries;

        return view('students.add', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'max:225'],
                'grade' => ['required', 'max:225'],
                'photo' => ['required'],
                'date_of_birth' => ['required'],
                'address' => ['required', 'max:225'],
                'country' => ['required', 'max:225'],
                'city' => ['required', 'max:225'],
            ]);

            $inputs = $request->only(["name", "grade", "photo", "date_of_birth", "address", "country", "city"]);

            if ($request->hasfile('photo')) {
                $inputs['photo'] = $this->uploadFile($request->file('photo'));
            }
            if (Student::create($inputs)) {
                return redirect()->route('students.index')->with('success', 'Update Successfull.');
            } else {
                return redirect()->route('students.index')->with('error', 'Update Successfull.');
            }

        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error',  $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::find($id);

            if ($student) {
                $this->RemoveFile($student->photo);
                if ($student->delete()) {
                    $result = ['message' => "Student Deleted Successfully", 'data' => [], 'status' => true];
                    return response($result, 200);
                } else {
                    $result = ['message' => "Something Went Wrong", 'data' => [], 'status' => false];
                    return response($result, 200);
                }
            } else {
                $result = ['message' => "Student Data Not Found...", 'data' => [], 'status' => false];
                return response($result, 200);
            }
        } catch (Exception $e) {
            $result = ['message' => $e->getMessage(), 'status' => false];
            return response($result, 200);
        }
    }

    public function uploadFile($icon)
    {
        $drive = public_path(DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR);
        $extension = $icon->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;
        $newImage = $drive . $filename;
        $imgResource = $icon->move($drive, $filename);
        return $filename;
    }

    public function RemoveFile($image)
    {
        $ImagePath = public_path(DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $image);
        if (\File::exists($ImagePath)) {
            \File::delete($ImagePath);
        }
    }
}
