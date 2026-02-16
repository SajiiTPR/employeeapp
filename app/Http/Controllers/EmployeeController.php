<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\category;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::latest()->paginate(8);
        return view('details.index', compact('employees'));
    }
    public function details($id){
        $employee = Employee::where('id', $id)->first();

        $category = category::all();        

        return view('details.details', compact('employee','category'));
    }

    public function create(){
        $employees = Employee::get();
        $categories = category::all();
        return view('details.create', compact('employees', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $result = new Employee;

        $result->fname = $validated['fname'];
        $result->lname = $validated['lname'];
        $result->mail = $validated['email'];
        $result->address = $validated['Address'];
        $result->phone = $validated['phone'];
        $result->category_id = $validated['category_id'];

        $result->save();
        return back()->with('success', 'Employee added successfully');
    }
    

    public function update($id){
        $employee = Employee::find($id);
        $categories = category::all();
        return view('details.update', compact('employee', 'categories'));
    }
    public function newupdate(Request $request, $id){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'Address' => 'required',
            'phone' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $result = Employee::where('id', $id)->first();

        $result->fname = $request->fname;
        $result->lname = $request->lname;
        $result->mail = $request->email;
        $result->address = $request->Address;
        $result->phone = $request->phone;
        $result->category_id = $request->category_id;

        $result->save();

        return redirect('/')->with('success', 'Employee updated successfully');
    }
}
