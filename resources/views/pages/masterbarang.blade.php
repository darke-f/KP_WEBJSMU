@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Barang</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Barang</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Stock Barang Januari 2019</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Note</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Note</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($barang) >0)
                        @foreach($barang as $brg)
                          <tr>
                            <td>{{$brg->kodeBarang}}</td>
                            <td>{{$brg->namaBarang}}</td>
                            <td>{{$brg->satuanBarang}}</td>
                            <td>{{$brg->noteBarang}}</td>
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