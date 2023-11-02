@extends('layouts.main')

@section('style')
    {{-- Select2 --}}
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    {{-- Tempusdominus Bootstrap 4 --}}
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data <strong>{{ $title }}</strong></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/orders">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                                <a href="/dashboard/orders" class="btn btn-sm bg-gradient-danger px-3"><i
                                        class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="item_id">Item</label>
                                                <select class="form-control select2bs4" id="item_id" name="item_id">
                                                    <option disabled selected>Select a item</option>
                                                    @foreach ($items as $item)
                                                        @if ($item->stock > 0)
                                                            @if (old('item_id', $order->item->id) == $item->id)
                                                                <option value="{{ $item->id }}" selected>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="customer">Customer</label>
                                                <input type="text"
                                                    class="form-control @error('customer') is-invalid @enderror"
                                                    id="customer" name="customer"
                                                    value="{{ old('customer', $order->customer) }}" required autofocus>
                                                @error('customer')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="date">Date Order</label>
                                                <div class="input-group date" id="dateOrder" data-target-input="nearest">
                                                    <input type="text"
                                                        class="form-control datetimepicker-input @error('date') is-invalid @enderror"
                                                        id="date" name="date"
                                                        value="{{ old('date', $order->date) }}" data-target="#dateOrder"
                                                        required>
                                                    <div class="input-group-append" data-target="#dateOrder"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                    @error('date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    id="quantity" name="quantity"
                                                    value="{{ old('quantity', $order->quantity) }}" required>
                                                @error('quantity')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="price_item">Price</label>
                                                <input type="number"
                                                    class="form-control @error('price_item') is-invalid @enderror"
                                                    id="price_item" name="price_item"
                                                    value="{{ old('price_item', $order->price_item) }}" required readonly>
                                                @error('price_item')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="total">Total</label>
                                                <input type="number"
                                                    class="form-control @error('total') is-invalid @enderror" id="total"
                                                    name="total" value="{{ old('total', $order->total) }}" required
                                                    readonly>
                                                @error('total')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="payment">Payment</label>
                                                <select class="form-control select2bs4" id="payment" name="payment">
                                                    @foreach (['Cash', 'Transfer Bank', 'Credit Card'] as $option)
                                                        <option value="{{ $option }}"
                                                            {{ $order->payment === $option || old('payment') === $option ? 'selected' : '' }}>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-sm bg-gradient-primary px-3">Edit</button>
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

@section('script')
    {{-- Select2 --}}
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    {{-- Moment Js  --}}
    <script src="/plugins/moment/moment.min.js"></script>
    {{-- Tempusdominus Bootstrap 4 --}}
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Date picker
        $('#dateOrder').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        //Pengisian Field Price
        $('#item_id').on('change', function() {
            var itemId = $(this).val();
            // Lakukan permintaan AJAX untuk mendapatkan harga item
            $.ajax({
                url: '{{ route('dashboard.items.json', ':item_id') }}'.replace(':item_id',
                    itemId), // Sesuaikan dengan rute Anda
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    // Mengisi input harga (price) dengan harga item yang diterima dari server
                    $('#price_item').val(response.price_item);
                },
                error: function() {
                    // Handle error jika perlu
                }
            });
        });

        //Pengisian Field Total
        $('#quantity').on('input', function() {
            // Ambil nilai quantity dan price
            var quantity = parseFloat($('#quantity').val());
            var price = parseFloat($('#price_item').val());

            // Hitung total
            var total = quantity * price;

            // Isikan nilai total ke input total
            $('#total').val(total);
        });
    </script>
@endsection
