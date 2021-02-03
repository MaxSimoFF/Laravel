<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $rules = $this->validateRules();
        $messages = $this->validateMessages();
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($req->all());
        }
        
        // This Create method insert new row to database.
        Employee::create([
            'first_name'    => $req->first_name,
            'last_name'     => $req->last_name,
            'age'           => $req->age,
            'email_address' => $req->email_address,
        ]);

        /*
        | and This is another way to insert row to database
        | by making object of Model class and assign column to values i got it from form request
        | then use save() method to insert it to database.
        */
        // $emp = new Employee;
        // $emp->first_name = $req->first_name;
        // $emp->last_name = $req->last_name;
        // $emp->email_address = $req->email_address;
        // $emp->save();

        return redirect()->route('employee.index')->with(['success' => 'Employee info added successfully']);
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
        $data = Employee::findOrFail($id);
        return view('employee.edit', ['employee' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        Employee::findOrFail($id);
        $req->validate([
            'first_name' => 'required|min:3|alpha_dash',
            'last_name' => 'required|min:3',
            'email_address' => 'required|email',
        ]);
        $update = DB::table('employees')
        ->where('id', '=', $id)
        ->update([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email_address' => $req->email_address,
        ]);
        if ($update) {
            return redirect()->route('employee.index')->with(['success' => 'Record Updated Successfully.']);
        } else {
            return redirect()->route('employee.index')->with(['error' => 'No record were updated.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return redirect()->route('employee.index')->with(['success' => 'Record deleted Successfully.']);
    }
    
    protected function validateRules()
    {
        return $rules = [
            'first_name'    => 'required|min:3|alpha_dash',
            'last_name'     => 'required|min:3|alpha_dash',
            'age'           => 'required|numeric',
            'email_address' => 'required|unique:employees,email_address|email',
        ];
        
    }
    
    protected function validateMessages()
    {
        return $messages = [
            'first_name.alpha_dash' => 'First name field contain forbidden symbol',
            'last_name.alpha_dash' =>'Last name field contain forbidden symbol',
            'email_address.required' => 'E-mail is required',
            'email_address.unique' => 'This email is already exist',
        ];
        
    }
}
