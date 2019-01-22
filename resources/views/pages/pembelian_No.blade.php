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

          {!! Form::open(['action'=> 'PembelianController@show_No','method'=>'GET','class' =>'form-inline ml-2 mb-4']) !!}
            <div class="form-group row">
              {{form::label('kodebeli','Kode:',['class'=> 'col-3 col-form-label'])}}
              <div class="col-8">
                <!-- {{form::text('kodebeli','',['class' =>'form-control here','placeholder' => 'No Transaksi'])}} -->
                <select class="form-control selectform" name="kodebeli" value="{{ old('kodebeli') }}" required>
                    <option value="Balum Dipilih" selected disabled hidden>Kode Transaksi:</option>
                    @if(count($beli) >0)
                        @foreach($beli as $bli)
                            <option value ='{{$bli->noTransaksiBeli}}'>{{$bli->noTransaksiBeli}}</option>
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
              <h6 class="ml-1"> No Transaksi : {{$hdr->noTransaksiBeli}}</h6>
              <h6 class="ml-1"> Periode Transaksi : {{$hdr->periodeTransaksiBeli}}</h6>
              <h6 class="ml-1"> Tanggal Transaksi : {{$hdr->tanggalTransaksiBeli}}</h6>
              <h6 class="ml-1"> Supplier : {{$supplier}}</h6>
              <h6 class="ml-1"> Subtotal : {{$hdr->subtotal}}</h6>
              <h6 class="ml-1"> Diskon : {{$hdr->discount."%"}}</h6>
              <h6 class="ml-1"> Grand Total : {{$hdr->grandtotal}}</h6>
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
                Pembelian
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($detail))
                        @foreach($detail as $dtl)
                          <tr>
                              <td>{{$dtl->kodeBarang}}</td>
                              <td>{{$dtl->namaBarang}}</td>
                              <td>{{$dtl->satuanBarang}}</td>
                              <td>{{$dtl->hargaSatuan}}</td>
                              <td>{{$dtl->quantity}}</td>
                              <td>{{$dtl->hargaTotal}}</td>
                          </tr>
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