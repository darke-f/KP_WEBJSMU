@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Stock Barang</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Stock Barang</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Stock Barang Januari 2019<a class="btn btn-primary float-right btn-sm" href="/adminwisatas/create">Tutup Bulan</a><a class="btn btn-primary float-right btn-sm mr-2" href="/adminwisatas/create">Kalkulasi</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Saldo Awal</th>
                      <th>Pemasukan</th>
                      <th>Pengeluaran</th>
                      <th>Saldo Akhir</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Saldo Awal</th>
                      <th>Pemasukan</th>
                      <th>Pengeluaran</th>
                      <th>Saldo Akhir</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($stock) >0)
                        @foreach($stock as $stc)
                          <tr>
                            <td>{{$stc->kodeBarang}}</td>
                            <td>{{$stc->namaBarang}}</td>
                            <td>{{$stc->satuanBarang}}</td>
                            <td>{{$stc->saldoAwal}}</td>
                            <td>{{$stc->pemasukan}}</td>
                            <td>{{$stc->pengeluaran}}</td>
                            <td>{{$stc->saldoAkhir}}</td>
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