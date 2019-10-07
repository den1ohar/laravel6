@extends('layouts.app')

@section('content')

    <div>
        <div class="card-title">
            <h1>Expenses Create</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('expenses.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                @if (isset($expense) && $expense->category->id === $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="project_id">Project</label>
                        <select class="form-control" name="project_id">
                            @foreach($projects as $project)
                                @if (isset($expense) && $expense->project->id === $project->id)
                                    <option value="{{ $expense->project->id }}" selected>{{ $project->project_name }}</option>
                                @else
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="company_id">Company</label>
                        <select class="form-control" name="company_id">
                            @foreach($companies as $company)
                                @if (isset($expense) && $expense->company->id === $company->id)
                                    <option value="{{ $expense->company->id }}" selected>{{ $company->company_name }}</option>
                                @else
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="type_id">Type</label>
                        <select class="form-control" name="type_id">
                            @foreach($types as $type)
                                @if (isset($expense) && $expense->type->id === $type->id)
                                    <option value="{{ $expense->type->id }}" selected>{{ $type->type_name }}</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" name="employee_id">
                            @foreach($employees as $employee)
                                @if (isset($expense) && $expense->employee->id === $employee->id)
                                    <option value="{{ $expense->employee->id }}" selected>{{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                @else
                                    <option value="{{ $employee->id }}">{{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $expense->amount ?? '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="note">Note</label>
                        <input type="text" class="form-control" id="note" name="note" value="{{ $expense->note ?? '' }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $expense->date ?? '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Choose receipts</label>
                    <input type="file" name="receipt[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment">{{ $expense->comment ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="errors">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger mb-2">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection