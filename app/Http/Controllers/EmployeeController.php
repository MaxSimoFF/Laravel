<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Faker::create()->email;
        $data = Employee::all();
        return view('employee.index', ['employees' => $data]);
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
        $req->validate([
            'first_name' => 'required|min:3|alpha_dash',
            'last_name' => 'required|min:3',
            'email_address' => 'required|unique:employees|email',
        ]);
        $emp = new Employee;
        $emp->first_name = $req->first_name;
        $emp->last_name = $req->last_name;
        $emp->email_address = $req->email_address;
        $emp->save();
        return redirect()->route('employee.index');
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
        $data = Employee::findOrFail($id);
        $req->validate([
            'first_name' => 'required|min:3|alpha_dash',
            'last_name' => 'required|min:3',
            'email_address' => 'required|email',
        ]);
        DB::table('employees')
        ->where('id', '=', $id)
        ->update([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email_address' => $req->email_address,
        ]);
        return redirect()->route('employee.index');
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
        return redirect()->route('employee.index');
    }
}
