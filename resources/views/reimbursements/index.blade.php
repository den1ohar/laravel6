@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <a href="{{ route('reimbursements.create') }}" class="btn btn-primary">
            Reimbursements <i class="fa fa-plus"></i>
        </a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Expense</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Comment</th>
                <th>Receipts</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reimbursements as $reimbursement)
                <tr>
                    <th>{{ $reimbursement->id }}</th>
                    <th>{{ $reimbursement->expense->date }}</th>
                    <th>{{ $reimbursement->date }}</th>
                    <th>{{ $reimbursement->amount }}</th>
                    <th>{{ $reimbursement->comment }}</th>
                    <th>
                        @foreach ($reimbursement->receipts as $receipt)
                            <a href="{{ route('receipts.show', $receipt->id) }}" target="_blank">Receipt #{{ $receipt->id }}</a>
                        @endforeach
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection