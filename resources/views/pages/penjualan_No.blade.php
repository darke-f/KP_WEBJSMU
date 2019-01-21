@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Penjualan</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Penjualan</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <h2 class="ml-1 mb-3"> Data penjualan :</h2>

          {!! Form::open(['action'=> 'PenjualanController@show_No','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group row">
              {{form::label('kodejual','Kode :',['class'=> 'col-3 col-form-label'])}}
              <div class="col-8">
                {{form::text('kodejual','',['class' =>'form-control here','placeholder' => 'No Transaksi'])}}
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-4 col-8">
                {{form::submit('Submit',['class'=>'btn btn-primary'])}}
              </div>
            </div>
          {!! Form::close() !!} 

          @if(isset($header) && count($header)>0)
            @foreach($header as $hdr)
              <h6 class="ml-1"> No Transaksi : {{$hdr->noTransaksiJual}}</h6>
              <h6 class="ml-1"> Periode Transaksi : {{$hdr->periodeTransaksiJual}}</h6>
              <h6 class="ml-1"> Tanggal Transaksi : {{$hdr->tanggalTransaksiJual}}</h6>
              <h6 class="ml-1"> Customer : {{$customer}}</h6>
            @endforeach
          @elseif(isset($nodata))
            <div class="alert alert-danger col-sm-2" role="alert">
              Data transaksi tidak ditemukan!
            </div>
          @endif

          <br>

          @if(isset($hdr))
            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Penjualan
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($detail))
                        @foreach($detail as $dtl)
                          <tr>
                              <td>{{$dtl->kodeBarang}}</td>
                              <td>{{$dtl->namaBarang}}</td>
                              <td>{{$dtl->satuanBarang}}</td>
                              <td>{{$dtl->quantity}}</td>
                          </tr>
                        @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @endif
@endsection