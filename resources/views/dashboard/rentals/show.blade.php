@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Data <strong>{{ $title }}</strong></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/rentals">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">View</li>
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
                                <a href="/dashboard/rentals" class="btn btn-sm bg-gradient-danger px-3"><i
                                        class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="item_id">Item</label>
                                                <input type="text" class="form-control" id="item_id" name="item_id"
                                                    value="{{ $rental->item->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="customer">Customer</label>
                                                <input type="text" class="form-control" id="customer" name="customer"
                                                    value="{{ $rental->customer }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="date">Date rental</label>
                                                <input type="text" class="form-control" id="date" name="date"
                                                    value="{{ \Carbon\Carbon::parse($rental->date)->format('d F Y') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity"
                                                    value="{{ $rental->quantity }} Pcs" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="day">Day</label>
                                                <input type="text" class="form-control" id="day" name="day"
                                                    value="{{ $rental->day }} Day" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="price_day">Price</label>
                                                <input type="text"
                                                    class="form-control @error('price_day') is-invalid @enderror"
                                                    id="price_day" name="price_day" value="@currency($rental->price_day)" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="text"
                                                    class="form-control @error('total') is-invalid @enderror" id="total"
                                                    name="total" value="@currency($rental->total)" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="payment">Payment</label>
                                                <input type="text" class="form-control" id="payment" name="payment"
                                                    value="{{ $rental->payment }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="created_at">Created At</label>
                                                <input type="text" class="form-control" id="created_at"
                                                    name="created_at"
                                                    value="{{ \Carbon\Carbon::parse($rental->created_at)->format('d F Y H:i:s') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="updated_at">Updated At</label>
                                                <input type="text" class="form-control" id="updated_at"
                                                    name="updated_at"
                                                    value="{{ \Carbon\Carbon::parse($rental->updated_at)->format('d F Y H:i:s') }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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
