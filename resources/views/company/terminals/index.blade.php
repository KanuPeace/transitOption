@extends('layouts.app' , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

    @include("layouts.breadcrumb", ["title" => "Terminals" ])

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title"></h4>
                        <a href="{{ route('company.terminals.create') }}" class="btn btn-primary btn-xs fr">New Terminal</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Email</th>
                                    <th>Phones</th>
                                    <th>Address</th>
                                    <th>L.G.A</th>
                                    <th>Status</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terminals as $terminal)
                                    <tr>
                                        <td>{{ $terminal->name }}</td>
                                        <td>{{ $terminal->code }}</td>
                                        <td>{{ $terminal->email ?? 'N/A' }}</td>
                                        <td>{{ $terminal->phones }}</td>
                                        <td>{{ $terminal->address }}</td>
                                        <td>{{ $terminal->lga_id }}</td>
                                        <td>{{ $terminal->getStatus() }}</td>
                                        <td>{{ $terminal->created_at }}</td>
                                        <td>
                                            <form action="{{ route('company.terminals.destroy', $terminal->id) }}"
                                                method="post">@csrf() @method("delete")
                                                <a href="{{ route('company.terminals.edit', $terminal->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
