@extends('layouts.parent')
@section('title', 'admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    @include('includes.response-messages')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name_en</th>
                            <th>email</th>
                            {{--  <th>Price (EGP)</th>  --}}
                            {{--  <th>type</th>  --}}
                            <th>Creation Date</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name_en}}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at }}</td>
                                <td>
                                    <a href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                        class="btn btn-outline-warning"> Edit </a>
                                        @if (Route::has('password.request'))
                                    <a class="btn btn-outline-primary" href="{{ route('dashboard.admins.reset',$admin->id) }}">
                                        {{ __('Change Password') }}
                                    </a>
                                @endif
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch(
                {
                    'state': $(this).prop('checked'),
                    'onSwitchChange':function(event , status){ $(this).parents('form:first').submit(); }
                }
            );
        });
    </script>

@endsection
