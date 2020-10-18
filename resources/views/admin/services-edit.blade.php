@extends('layouts.admin', ['pageHeader' => 'Services'])
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Update a Service</h5>
                </div>
                <div class="card-body table-border-style">
                    <form method="POST" action="{{ route('admin-services-update', $service->id)}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$service->name}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="service_type_id">Select a Service Type</label>
                                <div class="input-group">
                                    <select class="custom-select" name="service_type_id" id="service_type_id" required>
                                        <option selected disabled>Select a Category...</option>
                                        @foreach(\App\Models\ServiceType::all() as $serviceType)
                                            <option
                                                value="{{$serviceType->id}}" {{$serviceType->id === $service->service_type_id ? "selected" : ""}}>{{$serviceType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#photos').on('change', function () {
            // var fileNames = $(this).files;
            let numOfPhotos = $(this)[0].files.length;
            $(this).next('.custom-file-label').html(numOfPhotos + ' file(s) selected');
        })
    </script>
@endsection