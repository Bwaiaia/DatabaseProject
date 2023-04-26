@extends('layouts.frontend')
   
@section('content')
 
<div class="row my-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h2> Passport Details</h2>
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('frontend.products.index') }}"> Back</a>
                        </div> 
                    </div>
                    <div class="card-body p-4">
                       
                            <form class="text-center">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <strong>Employee:</strong>
                                    </div>
                                    <div>
                                        {{ $product->fullname }}
                                    </div>      
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <strong>Passport Number:</strong>
                                    </div>
                                    <div>
                                         {{ $product->passport_num }}
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <strong>Passport Type:</strong>
                                    </div>
                                    <div>
                                        {{ $product->passport_type }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <strong>Issue Date:</strong>
                                    </div>
                                    <div>
                                    {{ $product->issue_date }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <strong>Expiry Date:</strong>
                                    </div>
                                    <div>
                                    {{ $product->expiry_date }}
                                    </div>
                                </div>
                                <hr>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Passport Photo:</strong>
                                    </div>
                                    <div>
                                     <img src="/image/{{ $product->image }}" width="500px">
                                     <p>{{ $product->detail }}</p>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection