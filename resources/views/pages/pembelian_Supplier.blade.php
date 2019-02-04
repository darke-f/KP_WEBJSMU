@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Pembelian</a>
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
              <a href="#">Data Pembelian</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <h2 class="ml-1 mb-3"> Data pembelian :</h2>

          {!! Form::open(['action'=> 'PembelianController@show_Supplier','method'=>'GET','class' =>'form-inline ml-2 mb-4']) !!}
            <div class="form-group row">
              {{form::label('periode','Periode:',['class'=> 'col-3 col-form-label'])}}
                <!-- {{form::text('kodebeli','',['class' =>'form-control here','placeholder' => 'No Transaksi'])}} -->
              <input class="col-3 form-control{{ $errors->has('tanggalmulai') ? ' is-invalid' : '' }}" type="date" id="tanggalmulai" name="tanggalmulai" value="{{ old('tanggalmulai') }}" required>
              <p class="mr-3 ml-3 pt-3">s.d.</p>
              <input class="col-3 form-control{{ $errors->has('tanggalmulai') ? ' is-invalid' : '' }}" type="date" id="tanggalselesai" name="tanggalselesai" value="{{ old('tanggaselesai') }}" required>
            </div>
            <div class="form-group row">
              <div class="offset-1 col-8">
                {{form::submit('Submit',['class'=>'btn btn-primary'])}}
              </div>
            </div>
          {!! Form::close() !!} 

          @if(isset($header) && count($header)>0)
              <h6 class="ml-1"> Data Pembelian berdasarkan Supplier:</h6>
          @elseif(isset($nodata))
            <div class="alert alert-danger col-sm-2" role="alert">
              Data transaksi tidak ditemukan!
            </div>
          @endif

          <br>

          @if(isset($header))
            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Pembelian
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>No Transaksi</th>
                        <th>No PPB</th>
                        <th>Periode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Grand Total</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>No Transaksi</th>
                        <th>No PPB</th>
                        <th>Periode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Grand Total</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($header as $hdr)
                      <tr>
                          <td>{{$hdr->kodeSupplier}}</td>
                          <td>{{$hdr->supplier->namaSupplier}}</td>
                          <td>{{$hdr->noTransaksiBeli}}</td>
                          <td>{{$hdr->noPPB}}</td>
                          <td>{{$hdr->periodeTransaksiBeli}}</td>
                          <td>{{$hdr->tanggalTransaksiBeli}}</td>
                          <td>{{number_format($hdr->grandtotal)}}</td>
                    @endforeach
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