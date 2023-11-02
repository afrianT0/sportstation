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
                                <a href="/dashboard/rentals/create" class="btn btn-sm bg-gradient-primary px-3">
                                    <i class="fas fa-plus"></i> Create
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="tableRental" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Cashier</th>
                                                <th>Customer</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Day</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rentals as $rental)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $rental->date }}</td>
                                                    <td>{{ $rental->user->name }}</td>
                                                    <td>{{ $rental->customer }}</td>
                                                    <td>{{ $rental->item->name }}</td>
                                                    <td>{{ $rental->quantity }}</td>
                                                    <td>{{ $rental->day }}</td>
                                                    <td> @currency($rental->price_day)</td>
                                                    <td> @currency($rental->total)</td>
                                                    <td>
                                                        @php
                                                            $orderDate = \Carbon\Carbon::parse($rental->date);
                                                            $returnDate = $orderDate->copy()->addDays($rental->day);
                                                            $currentDate = \Carbon\Carbon::now();

                                                            if ($currentDate->addDays(1) >= $returnDate) {
                                                                echo '<span class="badge badge-pill badge-warning p-2">-1 Hari</span>';
                                                            } elseif ($currentDate >= $returnDate) {
                                                                echo '<span class="badge badge-pill badge-danger p-2">Habis</span>';
                                                            } else {
                                                                echo '<span class="badge badge-pill badge-success p-2">Berjalan</span>';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('rentals.show', $rental->id) }}"
                                                            class="btn btn-sm bg-gradient-info">
                                                            <i class="far fa-eye fa-fw"></i></a>

                                                        <a href="{{ route('rentals.edit', $rental->id) }}"
                                                            class="btn btn-sm bg-gradient-warning">
                                                            <i class="far fa-edit fa-fw"></i></a>

                                                        <a href="{{ route('rentals.destroy', $rental->id) }}"
                                                            class="btn btn-sm bg-gradient-danger" data-toggle="modal"
                                                            data-target="#modalDelete-{{ $rental->id }}"><i
                                                                class="far fa-trash-alt fa-fw"></i>
                                                        </a>
                                                        @include('dashboard.rentals.delete')
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Cashier</th>
                                                <th>Customer</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Day</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Status</th>
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
            $("#tableRental").DataTable({
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
