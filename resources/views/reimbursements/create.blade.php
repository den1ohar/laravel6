@extends('layouts.app')

@section('content')

    <div>
        <div class="card-title">
            <h1>Expenses Create</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('reimbursements.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="expense_id">Expense</label>
                        <select class="form-control" name="expense_id">
                            @foreach($expenses as $expense)
                                @if (isset($reimbursement) && $reimbursement->expense->id === $expense->id)
                                    <option value="{{ $expense->id }}" selected>{{ $expense->amount . ' - ' . $expense->date }}</option>
                                @else
                                    <option value="{{ $expense->id }}">{{ $expense->amount . ' - ' . $expense->date }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $reimbursement->date ?? '' }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $reimbursement->amount ?? '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Choose receipts</label>
                    <input type="file" name="receipt[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" value="{{ $reimbursement->comment ?? '' }}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="errors">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @endsection