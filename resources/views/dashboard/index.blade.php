@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Selamat datang <strong>{{ auth()->user()->name }}</strong> </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @can('isAdmin')
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    {{-- @php
                                        $totalCount = DB::table('in_archives')
                                            ->select(DB::raw('count(*) as count'))
                                            ->union(DB::table('out_archives')->select(DB::raw('count(*) as count')))
                                            ->sum('count');
                                    @endphp
                                    <h3>{{ $totalCount }}</h3>
                                    <p>Data Dokumen Keseluruhan</p> --}}
                                </div>
                                <div class="icon">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info lanjut
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    {{-- <h3>{{ DB::table('in_archives')->count() }}</h3>
                                    <p>Data Dokumen Masuk</p> --}}
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-import"></i>
                                </div>
                                <a href="/dashboard/in-archives" class="small-box-footer">Info lanjut
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    {{-- <h3>{{ DB::table('out_archives')->count() }}</h3>
                                    <p>Data Dokumen Keluar</p> --}}
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-export"></i>
                                </div>
                                <a href="/dashboard/out-archives" class="small-box-footer">Info lanjut
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    {{-- <h3>{{ DB::table('users')->count() }}</h3>
                                    <p>Total Pengguna</p> --}}
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="/dashboard/users" class="small-box-footer">Info lanjut
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    {{-- <h3>{{ DB::table('roles')->count() }}</h3>
                                    <p>Total Peran Pengguna</p> --}}
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <a href="/dashboard/roles" class="small-box-footer">Info lanjut
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                @endcan

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
