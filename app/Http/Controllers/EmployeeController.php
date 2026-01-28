<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        
        $employees = Employee::latest()->paginate(8);
        return view('details.index', compact('employees'));
    }
    public function details($id){
        $employee = Employee::where('id', $id)->first();
        return view('details.details', compact('employee'));
    }

    public function create(){
        return view('details.create');
    }
    public function delete($id){
        $dlt = Employee::where('id', $id)->first();
        $dlt->delete();
        return redirect('/')->with('success', 'Employee Deleted successfully');
    }
    public function insert(Request $request){

        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'phone' => 'required|numeric',
        ]);

        $result = new Employee;

        $result->fname = $validated['fname'];
        $result->lname = $validated['lname'];
        $result->mail = $validated['email'];
        $result->address = $validated['Address'];
        $result->phone = $validated['phone'];

        $result->save();
        return back()->with('success', 'Employee added successfully');
    }
    

    public function update($id){
        $employee = Employee::find($id);
        return view('details.update', compact('employee'));
    }
    public function newupdate(Request $request, $id){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'phone' => 'required|numeric',
        ]);

        $result = Employee::where('id', $id)->first();        

        $result->fname = $request->fname;
        $result->lname = $request->lname;
        $result->mail = $request->email;
        $result->address = $request->Address;
        $result->phone = $request->phone;

        $result->save();
        
        return redirect('/')->with('success', 'Employee updated successfully');
    }
}
