@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employees.update", [$employee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.employee.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $employee->full_name) }}" required>
                @if($errors->has('full_name'))
                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.employee.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $employee->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.employee.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $employee->dob) }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.employee.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $employee->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_name">{{ trans('cruds.employee.fields.training_name') }}</label>
                <input class="form-control {{ $errors->has('training_name') ? 'is-invalid' : '' }}" type="text" name="training_name" id="training_name" value="{{ old('training_name', $employee->training_name) }}" required>
                @if($errors->has('training_name'))
                    <span class="text-danger">{{ $errors->first('training_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_type">{{ trans('cruds.employee.fields.training_type') }}</label>
                <input class="form-control {{ $errors->has('training_type') ? 'is-invalid' : '' }}" type="text" name="training_type" id="training_type" value="{{ old('training_type', $employee->training_type) }}" required>
                @if($errors->has('training_type'))
                    <span class="text-danger">{{ $errors->first('training_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_provid">{{ trans('cruds.employee.fields.training_provid') }}</label>
                <input class="form-control {{ $errors->has('training_provid') ? 'is-invalid' : '' }}" type="text" name="training_provid" id="training_provid" value="{{ old('training_provid', $employee->training_provid) }}" required>
                @if($errors->has('training_provid'))
                    <span class="text-danger">{{ $errors->first('training_provid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_provid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_ini">{{ trans('cruds.employee.fields.training_ini') }}</label>
                <input class="form-control date {{ $errors->has('training_ini') ? 'is-invalid' : '' }}" type="text" name="training_ini" id="training_ini" value="{{ old('training_ini', $employee->training_ini) }}" required>
                @if($errors->has('training_ini'))
                    <span class="text-danger">{{ $errors->first('training_ini') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_ini_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_end">{{ trans('cruds.employee.fields.training_end') }}</label>
                <input class="form-control date {{ $errors->has('training_end') ? 'is-invalid' : '' }}" type="text" name="training_end" id="training_end" value="{{ old('training_end', $employee->training_end) }}" required>
                @if($errors->has('training_end'))
                    <span class="text-danger">{{ $errors->first('training_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="training_dur">{{ trans('cruds.employee.fields.training_dur') }}</label>
                <input class="form-control {{ $errors->has('training_dur') ? 'is-invalid' : '' }}" type="text" name="training_dur" id="training_dur" value="{{ old('training_dur', $employee->training_dur) }}" required>
                @if($errors->has('training_dur'))
                    <span class="text-danger">{{ $errors->first('training_dur') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.training_dur_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection