@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Penjualan</a>
@endsection

@section('head')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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

          {!! Form::open(['action'=> 'PenjualanController@show_Customer','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group row">
              {{form::label('namacustomer','Customer:',['class'=> 'col-3 col-form-label'])}}
              <div class="col-8">
                <!-- {{form::text('namacustomer','',['class' =>'form-control here','placeholder' => 'Nama Customer'])}} -->
                <select class="form-control selectform" name="namacustomer" value="{{ old('namacustomer') }}" required>
                    <option value="Balum Dipilih" selected disabled hidden>Nama Customer:</option>
                    @if(count($customer) >0)
                        @foreach($customer as $ctm)
                            <option value ='{{$ctm->namaCustomer}}'>{{$ctm->namaCustomer}}</option>
                        @endforeach
                    @endif
                </select>
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
              <h6 class="ml-1"> Kode Customer : {{$hdr->kodeCustomer}}</h6>
              <h6 class="ml-1"> Nama Customer : {{$hdr->namaCustomer}}</h6>
              <h6 class="ml-1"> Grand Total : {{number_format($grandtotal)}}</h6>
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
                        <th>No Transaksi</th>
                        <th>Periode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                        <th>Diskon</th>
                        <th>Harga Akhir</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No Transaksi</th>
                        <th>Periode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                        <th>Diskon</th>
                        <th>Harga Akhir</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($data))
                      @foreach($data as $dt)
                        @foreach($dt->dtl as $dtl)
                        <tr>
                          <td>{{$dt->noTransaksiJual}}</td>
                          <td>{{$dt->periodeTransaksiJual}}</td>
                          <td>{{$dt->tanggalTransaksiJual}}</td>
                          <td>{{$dtl->kodeBarang}}</td>
                          <td>{{$dtl->namaBarang}}</td>
                          <td>{{$dtl->satuanBarang}}</td>
                          <td>{{number_format($dtl->hargaSatuan)}}</td>
                          <td>{{$dtl->quantity}}</td>
                          <td>{{number_format($dtl->hargaTotal)}}</td>
                          <td>{{$dt->discount."%"}}</td>
                          <td>{{number_format($dtl->hargaTotal * (100-$dt->discount)/100)}}</td>
                        </tr>
                        @endforeach
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @endif


    <script type="text/javascript">
      $('.selectform').select2();
    </script>
@endsection