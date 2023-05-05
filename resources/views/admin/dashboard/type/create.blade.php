@extends('admin.layout.app')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Event Type</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('types.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <x-admin.label for="title" value="Event Type" />
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
