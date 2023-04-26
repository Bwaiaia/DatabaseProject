@extends('layouts.frontend')
     
@section('content')
<!-- JQuery Table  -->
<link rel="" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- Card Container -->
<div class="container">
    <div class="row justify-content center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <h2>MFMRD Passport</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('frontend.products.create') }}"> Upload Passport</a>
                        </div>
                    </div>
                    
                    <!-- Error Message -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <!-- Table Content -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="table_1">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Employee</th>
                                    <th>Passport Number</th>
                                    <th>Passport Type</th>
                                    <th>Issue Date</th>
                                    <th>Expiry Date</th>
                                    <!-- <th>Passport Photo</th>
                                    <th>Comment</th> -->
                                    <th width="50px">Creat At</th>
                                    <th width="50px">Update At</th>
                                    <th width="280px" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->fullname }}</td>
                                    <td>{{ $product->passport_num }}</td>
                                    <td>{{ $product->passport_type }}</td>
                                    <td>{{ $product->issue_date }}</td>
                                    <td>{{ $product->expiry_date }}</td>
                                    <!-- <td><img src="/image/{{ $product->image }}" width="100px"></td>
                                    <td>{{ $product->detail }}</td> -->
                                    <td class="text-center">{{ date("d F Y", strtotime($product['created_at'])) }}</td>
                                    <td class="text-center">{{date("d F Y", strtotime($product['created_at']))}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('frontend.products.show',$product->id) }}">Show</a>
                            
                                        <a class="btn btn-primary" href="{{ route('frontend.products.edit',$product->id) }}">Edit</a>
                                        <form action="{{ route('frontend.products.destroy',$product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

<!-- Script -->
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#table_1').DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });
    </script>
    @parent
@endsection
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 























<!-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('#table_3').DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });
    </script>
    @parent
@endsection
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>  -->

<!-- Script
@section('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table_3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
            "paginate": {
            "next": "Next",
            "previous": "Prev"
            },
            "search": "Search",
            "zeroRecords": "No matching records found"
            }
            });
            });
</script>
@endsection -->