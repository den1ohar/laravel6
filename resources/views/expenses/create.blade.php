@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Expenses Create</h1>
    </div>
    <br>
    <div class="table-responsive">
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="type_id">Type</label>
                <select class="form-control" name="type_id">
                    <option value="">-none-</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    <option value="">-none-</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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

            <div class="form-group">
                <label for="company_id">Company</label>
                <select class="form-control" name="company_id">
                    <option value="">-none-</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="project_id">Project</label>
                <select class="form-control" name="project_id">
                    <option value="">-none-</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select class="form-control" name="employee_id">
                    <option value="">-none-</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name . ' ' . $employee->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" class="form-control" id="note" name="note">
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