@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- BASIC TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Student </h3>
                        </div>
                        <div class="panel-body">
                            <form class="needs-validation" method="POST" action="{{ route('students.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Name"
                                            value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger"> {{ $errors->first('name') }} </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control  @error('date_of_birth') is-invalid @enderror" placeholder="Name"
                                            value="{{ old('date_of_birth') }}" required>

                                        @if ($errors->has('date_of_birth'))
                                            <span class="text-danger"> {{ $errors->first('date_of_birth') }} </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Photo</label>
                                        <input type="file" name="photo" class="form-control  @error('photo') is-invalid @enderror" value="{{ old('photo') }}"
                                            required>

                                            @if ($errors->has('photo'))
                                            <span class="text-danger"> {{ $errors->first('photo') }} </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Grade</label>
                                        <input type="text" name="grade" class="form-control  @error('grade') is-invalid @enderror" placeholder="Grade"
                                            value="{{ old('grade') }}" required>

                                        @if ($errors->has('grade'))
                                            <span class="text-danger"> {{ $errors->first('grade') }} </span>
                                        @endif
                                    </div>
                                   
                                   
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Country</label>
                                        <select class="form-control  @error('country') is-invalid @enderror" id="country" name="country" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger"> {{ $errors->first('country') }} </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">City</label>
                                        <input type="text" name="city" class="form-control  @error('city') is-invalid @enderror" placeholder="City"
                                            value="{{ old('city') }}" required>

                                        @if ($errors->has('city'))
                                            <span class="text-danger"> {{ $errors->first('city') }} </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Address</label>
                                        <textarea name="address" class="form-control  @error('address') is-invalid @enderror"
                                            rows="5">{{ old('address') }}</textarea>

                                        @if ($errors->has('address'))
                                            <span class="text-danger"> {{ $errors->first('address') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
