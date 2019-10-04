@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Expenses Create</h1>
    </div>
    <br>
    <div class="table-responsive">
        <form action="{{ route('reimbursements.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="expense_id">Expense</label>
                <select class="form-control" name="expense_id">
                    <option value="">-none-</option>
                    @foreach($expenses as $expense)
                        <option value="{{ $expense->id }}">{{ $expense->amount . ' - ' . $expense->date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection