<?php

namespace App\Http\Controllers;

use App\{
    Category,
    Company,
    Employee,
    Expense,
    Project,
    Type
};
use App\Http\Requests\ExpenseCreateRequest;
use League\Flysystem\Exception;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderBy('date', 'DESC')->get();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();
        $companies = Company::orderBy('company_name')->get();
        $employees = Employee::orderBy('first_name')->get();
        $projects = Project::orderBy('project_name')->get();
        $types = Type::orderBy('type_name')->get();

        return view('expenses.create', compact('categories', 'companies', 'employees', 'projects', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExpenseCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCreateRequest $request)
    {
        $data = $request->all();

        Expense::create($data);

        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
