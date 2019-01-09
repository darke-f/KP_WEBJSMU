@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Supplier</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Supplier</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Data Supplier</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Supplier</th>
                      <th>Alamat</th>
                      <th>Kota</th>
                      <th>Jenis</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Supplier</th>
                      <th>Alamat</th>
                      <th>Kota</th>
                      <th>Jenis</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($supplier) >0)
                        @foreach($supplier as $sup)
                          <tr>
                            <td>{{$sup->kodeSupplier}}</td>
                            <td>{{$sup->namaSupplier}}</td>
                            <td>{{$sup->alamatSupplier}}</td>
                            <td>{{$sup->kotaSupplier}}</td>
                            <td>{{$sup->jenisSupplier}}</td>
                          </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection