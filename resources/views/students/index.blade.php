@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Students
                        <a href="{{ route('students.create') }}" class="btn btn-primary float-right">Add Student</a>
                    </h1>

                </div>
                <div class="col-md-12">
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Table</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Grade</th>
                                        <th>Date of Birth</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('student.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'grade',
                        name: 'grade'
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });

    </script>
@endsection
