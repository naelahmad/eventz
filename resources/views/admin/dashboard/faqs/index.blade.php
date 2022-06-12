@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">
                Create New Frequently Asked Question
            </a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Payments Queue</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width80">#</th>
                                    <th>Question</th>
                                    <th>Answer</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td><strong>{{ $faq->id }}</strong></td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('faqs.edit', $faq->id) }}">Edit</a>

                                                    <form id="my_form" action="{{ route('faqs.destroy', $faq->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit " class="dropdown-item">Delete</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
