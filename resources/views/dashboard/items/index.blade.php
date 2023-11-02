@extends('layouts.main')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data <strong>{{ $title }}</strong></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="/dashboard/items/create" class="btn btn-sm bg-gradient-primary px-3">
                                    <i class="fas fa-plus"></i> Create
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="tableItem" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                                <th>Price per Item</th>
                                                <th>Price per Day</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->category }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->stock }}</td>
                                                    <td> @currency($item->price_item)</td>
                                                    <td> @currency($item->price_day)</td>
                                                    <td>
                                                        <a href="{{ route('items.show', $item->id) }}"
                                                            class="btn btn-sm bg-gradient-info" data-toggle="modal"
                                                            data-target="#modalShow-{{ $item->id }}">
                                                            <i class="far fa-eye fa-fw"></i></a>
                                                        @include('dashboard.items.show')

                                                        <a href="{{ route('items.edit', $item->id) }}"
                                                            class="btn btn-sm bg-gradient-warning">
                                                            <i class="far fa-edit fa-fw"></i></a>

                                                        <a href="{{ route('items.destroy', $item->id) }}"
                                                            class="btn btn-sm bg-gradient-danger" data-toggle="modal"
                                                            data-target="#modalDelete-{{ $item->id }}"><i
                                                                class="far fa-trash-alt fa-fw"></i>
                                                        </a>
                                                        @include('dashboard.items.delete')
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                                <th>Price per Item</th>
                                                <th>Price per Day</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#tableItem").DataTable({
                "lengthMenu": [5, 10, 25, 50, 75, 100]
            })
        });
    </script>

    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
@endsection
