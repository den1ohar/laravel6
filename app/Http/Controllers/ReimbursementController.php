<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Reimbursement;
use App\Models\Receipt;
use App\Http\Requests\ReimbursementCreateRequest;

class ReimbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reimbursements = Reimbursement::orderBy('date', 'DESC')->get();

        return view('reimbursements.index', compact('reimbursements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenses = Expense::orderBy('date', 'DESC')->get();

        return view('reimbursements.create', compact('expenses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReimbursementCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReimbursementCreateRequest $request)
    {
        $reimbursement = Reimbursement::create($request->all());

        if ($request->receipt && $reimbursement) {
            foreach ($request->receipt as $key => $receipt) {
                $path = $receipt->store('public/reimbursement');
                $filename = $receipt->getClientOriginalName();

                $receipt = new Receipt();
                $receipt->reimbursement_id = $reimbursement->id;
                $receipt->path = $path;
                $receipt->original_name = $filename;
                $receipt->save();
            }
        }

        return redirect()->route('reimbursements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reimbursement $reimbursement)
    {
        $expenses = Expense::orderBy('date', 'DESC')->get();

        return view('expenses.create', compact('expenses', 'reimbursement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
