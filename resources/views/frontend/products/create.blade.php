@extends('layouts.frontend')
  
@section('content')
<div class="row my-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
        <div class="card-header">
            
                <div class="pull-left">
                    <h2>Add New Passport</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('frontend.products.index') }}"> Back</a>
                </div>
            
        </div>
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <form action="{{ route('frontend.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Employee Name:</strong>
                        <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Employee Fullname" value="{{ old('fullname') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Passport Number:</strong>
                        <input type="text" name="passport_num" id="passport_num" class="form-control @error('passport_num') is-invalid @enderror" placeholder="Employee Passport Number" value="{{ old('passport_num') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Passport Type:</strong>
                        <!-- <input type="text" name="passport_type" class="form-control" placeholder="Passport Type"> -->
                        <select name="passport_type" id="passport_type" class="form-control" aria-lable=".form-select-lg example">
                        <option value="select">Select Here</option>
                        <option value="Official">Official</option>
                        <option value="Diplomatic">Diplomatic</option>
                        <option value="Ordinary">Ordinary</option>
                    </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Issue Date:</strong>
                        <input type="date" name="issue_date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" placeholder="Passport Issue Date" value="{{ old('issue_date') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Expiry Date:</strong>
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" placeholder="Passport Expiry Date" value="{{ old('expiry_date') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Passport Photo:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="my-2">
                        <strong>Comment:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Say something please ahah"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>
        </div>
    </div>
</div>
@endsection