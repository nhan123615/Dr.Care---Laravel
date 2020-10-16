@extends('layouts.admin', ['pageHeader' => 'Doctors'])
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Diseases</h5>
                    <a role="button" href="{{route('admin-doctors-create')}}" class="btn btn-primary text-white">Create</a>
                </div>
                <div class="card-body table-border-style">
                    <div class="col-12 d-flex flex-wrap">
                        @foreach($doctors as $doctor)
                            <div class="col-3">
                                <div class="card mb-3">
                                    <img class="img-fluid card-img-top"
                                         src="{{asset($doctor->photo)}}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$doctor->name}}</h5>
                                        <p class="card-text"><span class="badge badge-secondary">{{\Illuminate\Support\Facades\DB::table('doctor_types')->find($doctor->doctor_type_id)->name}}</span></p>
                                        <a class="btn btn-outline-primary btn-sm" role="button" href="{{route('admin-doctors-edit', ['id' => $doctor->id])}}">Edit</a>
                                        &nbsp;
                                        <a class="btn  btn-outline-danger btn-sm" role="button" href="{{route('admin-doctors-delete', ['id' => $doctor->id])}}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$doctors->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
