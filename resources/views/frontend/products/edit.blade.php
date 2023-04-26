@extends('layouts.frontend')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
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
    
   
  
 <div class="row my-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-dark">
                <div class="pull-left">
                    <h2 class="text-light fw-bold">Passport Edition</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('frontend.products.index') }}"> Back</a>
                </div>            
            </div>
        
            <div class="card-body p-4">
                <form action="{{ route('frontend.products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Employee Name:</strong>
                            <input type="text" name="fullname" value="{{ $product->fullname }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Passport Number:</strong>
                            <input type="text" name="passport_num" value="{{ $product->passport_num }}" class="form-control" placeholder="Passport Number">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Passport Type:</strong>
                            <!-- <input type="text" name="passport_type" value="{{ $product->passport_type }}" class="form-control" placeholder="Passport Type"> -->
                            <select name="passport_type" id="passport_type" class="form-control" aria-lable=".form-select-lg example" value="{{ $product->passport_type }}">
                                <option value="Official">Official</option>
                                <option value="Diplomatic">Diplomatic</option>
                                <option value="Ordinary">Ordinary</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Issue Date:</strong>
                            <input type="text" name="issue_date" value="{{ $product->issue_date }}" class="form-control" placeholder="Issue Date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Expiry Date:</strong>
                            <input type="text" name="expiry_date" value="{{ $product->expiry_date }}" class="form-control" placeholder="Expiry Date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Passport Photo:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <img src="/image/{{ $product->image }}" width="300px">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Comment:</strong>
                            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
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
</div>
@endsection