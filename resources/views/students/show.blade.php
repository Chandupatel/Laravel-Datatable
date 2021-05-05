@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Student Details  </h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$student->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Grade</th>
                                        <td>{{$student->grade}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>{{date('d-m-Y',strtotime($student->date_of_birth))}}</td>
                                    </tr>

                                    <tr>
                                        <th>Country</th>
                                        <td>{{$student->country}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{$student->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$student->address}}</td>
                                    </tr>

                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <img src="{{asset('storage/image/'.$student->photo)}}" alt="photo" width="100px;" height="100px;">
                                        </td>
                                    </tr>
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
