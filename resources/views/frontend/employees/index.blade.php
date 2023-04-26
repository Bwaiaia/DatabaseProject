@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('employee_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.employees.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Employee">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.full_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.dob') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_provid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_ini') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_end') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.training_dur') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.employee.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $key => $employee)
                                    <tr data-entry-id="{{ $employee->id }}">
                                        <td>
                                            {{ $employee->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->full_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->dob ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_provid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_ini ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_end ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->training_dur ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $employee->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('employee_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.employees.show', $employee->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('employee_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.employees.edit', $employee->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('employee_delete')
                                                <form action="{{ route('frontend.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.employees.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Employee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection