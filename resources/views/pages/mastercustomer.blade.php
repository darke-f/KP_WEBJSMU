@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Customer</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Customer</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Data Pelanggan</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Keterangan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($customer) >0)
                        @foreach($customer as $cust)
                          <tr>
                            <td>{{$cust->kodeCustomer}}</td>
                            <td>{{$cust->namaCustomer}}</td>
                            <td>{{$cust->alamatCustomer}}</td>
                            <td>{{$cust->keteranganCustomer}}</td>
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