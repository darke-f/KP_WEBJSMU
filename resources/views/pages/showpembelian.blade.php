@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Pembelian</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Pembelian</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <h2 class="ml-1"> Data pembelian pada : </h2>

          {!! Form::open(['action'=> 'PembelianController@show','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group row">
              {{form::label('kode','Kode :',['class'=> 'col-3 col-form-label'])}}
              <div class="col-8">
                {{form::text('kode','',['class' =>'form-control here','placeholder' => 'Kode Transaksi'])}}
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-4 col-8">
                {{form::submit('Submit',['class'=>'btn btn-primary'])}}
              </div>
            </div>
          </form>
          {!! Form::close() !!} 

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              </div>
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
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection