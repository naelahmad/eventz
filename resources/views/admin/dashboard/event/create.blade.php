@extends('admin.layout.app')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Frequently Asked Question</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                    <x-admin.label for="title" value="Enter Event Title" />
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                    <x-admin.label for="title" value="Enter Event Image" />
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-md-12">
                            <x-admin.label for="address" value="Enter Event Location" />
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <textarea class="ckeditor form-control" name="content" id="editor1"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <x-admin.label for="price" value="Enter Event Price" />
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                id="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <x-admin.label for="available_tickets" value="Enter Event Available Tickets" />
                            <input type="text" class="form-control @error('available_tickets') is-invalid @enderror"
                                name="available_tickets" id="available_tickets" value="{{ old('available_tickets') }}">
                        </div>

                        <div class="form-group col-md-12">
                            <x-admin.label for="event_date" value="Enter Event Date" />
                            <input name="event_date" class="datepicker-default form-control" id="event_date">
                        </div>
                </div>
                <div class="form-group col-md-12">
                    <x-admin.label for="event_type" value="Select Event Type" />

                    <select id="single-select" name="event_type" class="form-control">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>
@endsection
