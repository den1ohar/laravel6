<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseCreateRequest;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use App\Models\Category;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Type;
use App\Models\Receipt;
use App\Models\Reimbursement;

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
        $expense = Expense::create($request->all());

        if ($request->receipt && $expense) {
            foreach ($request->receipt as $key => $receipt) {
                $path = $receipt->store('public/expenses_receipts');
                $filename = $receipt->getClientOriginalName();

                $receipt = new Receipt();
                $receipt->expense_id = $expense->id;
                $receipt->path = $path;
                $receipt->original_name = $filename;
                $receipt->save();
            }
        }

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
        $categories = Category::orderBy('category_name')->get();
        $companies = Company::orderBy('company_name')->get();
        $employees = Employee::orderBy('first_name')->get();
        $projects = Project::orderBy('project_name')->get();
        $types = Type::orderBy('type_name')->get();

        return view('expenses.create', compact('categories', 'companies', 'employees', 'projects', 'types', 'expense'));
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

    public function checked(Request $request)
    {
        $receipts = Receipt::where($request->type . '_id', $request->record_id)->get();
        $expense = Expense::find($request->record_id);
        $expense_amount = $expense->amount;
        $reimbursements = Reimbursement::where('expense_id', $expense->id)->get();
        $reimbursement_amount = 0;

        foreach ($reimbursements as $reimbursement) {
            $reimbursement_amount += $reimbursement->amount;
        }

        // return response()->json($reimbursement_amount >= $expense_amount);

        $expense->checked = (int) $request->value;

        if (!$receipts->count() || $reimbursement_amount < $expense_amount) {
            $expense->save();

            return response()->json(true);
        }

        return response()->json(false);
    }
}
