@extends('admin.layout.app')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Frequently Asked Question</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('faqs.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <x-admin.label for="question" value="Enter Question" />
                                <input type="text" class="form-control @error('question') is-invalid @enderror"
                                    name="question" id="question" value="{{ old('question') }}">
                                @error('question')
                                    <p class="text-warning">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <x-admin.label for="answer" value="Enter Answer" />
                                <input type="text" class="form-control @error('answer') is-invalid @enderror" name="answer"
                                    id="answer" value="{{ old('answer') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
