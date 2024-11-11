@extends('layouts.app')
@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">
                    Dashboard
                </h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{route('tasks.dashboard')}}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        All Users
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            @include('includes.small-box')
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
            <!-- Start col -->
            <div class="col-12" id="tableTask">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">User Lists</h5>
                        <div class="card-tools">
                            {{--  --}}
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive">

                            <table class="table table-striped align-middle" style="width: 100%">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="text-start">#</th>
                                        <th scope="col" class="text-start">Name</th>
                                        <th scope="col" class="text-start">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr>
                                        <th scope="row" style="width:3%">
                                            {{ $items->currentPage() * $items->perPage() - $items->perPage() + $loop->iteration }}
                                        </th>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td style="width: 45%">
                                            {{$item->email}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-bg-danger">
                                            <p>No user available.</p>
                                        </td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item {{ $items->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}" tabindex="-1">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $items->lastPage(); $i++)
                                    <li class="page-item {{ $items->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $items->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> <!-- /.direct-chat -->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div>
</div>
@endsection

