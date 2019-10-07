@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">
            Expenses <i class="fa fa-plus"></i>
        </a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Type</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Comment</th>
                <th>Company</th>
                <th>Project</th>
                <th>Employee</th>
                <th>Note</th>
                <th>Receipts</th>
                <th>Edit</th>
                <th>Flag</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <th>{{ $expense->id }}</th>
                    <th>{{ $expense->date }}</th>
                    <th>{{ $expense->type->type_name }}</th>
                    <th>{{ $expense->category->category_name }}</th>
                    <th>{{ $expense->amount }}</th>
                    <th>{{ $expense->comment }}</th>
                    <th>{{ $expense->company->company_name }}</th>
                    <th>{{ $expense->project->project_name }}</th>
                    <th>{{ $expense->employee->first_name . ' ' . $expense->employee->last_name }}</th>
                    <th>{{ $expense->note }}</th>
                    <th>
                        @foreach ($expense->receipts as $receipt)
                            <a href="{{ route('receipts.show', $receipt->id) }}" target="_blank">Receipt #{{ $receipt->id }}</a>
                        @endforeach
                    </th>
                    <th><a href="{{ route('expenses.edit', $expense->id) }}">Edit</a></th>
                    <th>
                        <form>
                        <input type="checkbox" class="flag" data-type="expense" data-id="{{ $expense->id }}" @if($expense->checked) checked @endif>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection