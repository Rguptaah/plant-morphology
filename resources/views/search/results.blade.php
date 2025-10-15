@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Results for "{{ $searchTerm }}"</div>

                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $searchTerm }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    @if($searchTerm)
                        <!-- Plants Results -->
                        <h3>Plants</h3>
                        @if($plants->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($plants as $plant)
                                            <tr>
                                                <td>{{ $plant->plant_name }}</td>
                                                <td>
                                                    @if($plant->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @elseif($plant->status == 'approved')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif($plant->status == 'rejected')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>{{ $plant->creator->name }}</td>
                                                <td>
                                                    <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-sm btn-info">View</a>
                                                    @if(Auth::user()->id == $plant->created_by && $plant->status == 'pending')
                                                        <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $plants->appends(['search' => $searchTerm, 'queries_page' => request('queries_page'), 'users_page' => request('users_page')])->links() }}
                        @else
                            <p>No plants found matching your search.</p>
                        @endif

                        <hr>

                        <!-- Queries Results -->
                        <h3>Queries</h3>
                        @if($queries->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($queries as $query)
                                            <tr>
                                                <td>{{ $query->subject }}</td>
                                                <td>
                                                    @if($query->status == 'open')
                                                        <span class="badge bg-warning text-dark">Open</span>
                                                    @elseif($query->status == 'assigned')
                                                        <span class="badge bg-info">Assigned</span>
                                                    @elseif($query->status == 'resolved')
                                                        <span class="badge bg-success">Resolved</span>
                                                    @endif
                                                </td>
                                                <td>{{ $query->creator->name }}</td>
                                                <td>
                                                    <a href="{{ route('queries.show', $query->id) }}" class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $queries->appends(['search' => $searchTerm, 'plants_page' => request('plants_page'), 'users_page' => request('users_page')])->links() }}
                        @else
                            <p>No queries found matching your search.</p>
                        @endif

                        <!-- Users Results - Only for administrators -->
                        @if(Auth::user()->hasRole('administrator'))
                            <hr>
                            <h3>Users</h3>
                            @if($users->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach($user->roles as $role)
                                                            <span class="badge bg-secondary">{{ $role->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $users->appends(['search' => $searchTerm, 'plants_page' => request('plants_page'), 'queries_page' => request('queries_page')])->links() }}
                            @else
                                <p>No users found matching your search.</p>
                            @endif
                        @endif
                    @else
                        <div class="alert alert-info">
                            Enter a search term to find plants, queries, and users.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection