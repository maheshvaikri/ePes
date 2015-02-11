@if(Session::has('error'))
<div class="alert alert-danger">
    <span>{{ Session::get('error') }}</span>
</div>
@endif

<div class="form-group">
    {{ Form::label('employee_no', 'Employee Number *', ['class' => 'form-label']) }}
    {{ Form::text('employee_no', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('department_id', 'Department *', ['class' => 'form-label']) }}
    {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('role_id', 'Department *', ['class' => 'form-label']) }}
    {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<a href="/admin/users" class="btn btn-danger">Back</a>
<button type="submit" class="btn btn-primary">Submit</button>