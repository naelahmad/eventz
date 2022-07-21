@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="card-body">
            <form action="{{ route('events.index') }}" method="get" class="form-inline">
                <input type="text" class="form-control" name="event_name" placeholder="Event Name">
                <input type="number" class="form-control" name="min_price" placeholder="Price From">
                <input type="number" class="form-control" name="max_price" placeholder="Price To">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-lg-12">
            <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">
                Create New Event
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
                                    <th>TITLE</th>
                                    <th>ADDRESS</th>
                                    <th>PRICE</th>
                                    <th>STATUS</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td><strong>{{ $event->id }}</strong></td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->address }}</td>
                                        <td>{{ $event->price }}</td>
                                        <td>{{ $event->available_tickets }}</td>
                                        <td><img src="{{ asset('storage/' . $event->image) }}" height="70px"
                                                width="70px" alt=""> </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp"
                                                    data-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2" />
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('events.edit', $event->id) }}">Edit</a>
                                                    <form action="{{ route('events.destroy', $event->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            Delete
                                                        </button>
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
