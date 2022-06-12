@extends('admin.layout.app')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Frequently Asked Question</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <x-admin.label for="title" value="Enter Event Title" />
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <x-admin.label for="address" value="Enter Event Location" />
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="title"
                                    id="address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <x-admin.label for="description" value="Enter Event Description" />
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description') }}">
                                </textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <x-admin.label for="price" value="Enter Event Price" />
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="title"
                                    id="price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <x-admin.label for="available_tickets" value="Enter Event Available Tickets" />
                                <input type="text" class="form-control @error('available_tickets') is-invalid @enderror"
                                    name="title" id="available_tickets" value="{{ old('available_tickets') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <x-admin.label for="event_date" value="Enter Event Date" />
                                <input name="event_date" class="datepicker-default form-control" id="event_date">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
