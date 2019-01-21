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

          <h2 class="ml-1 mb-3"> Data pembelian :</h2>

          {!! Form::open(['action'=> 'PembelianController@show_Supplier','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group row">
              {{form::label('namasupplier','Supplier :',['class'=> 'col-3 col-form-label'])}}
              <div class="col-8">
                {{form::text('namasupplier','',['class' =>'form-control here','placeholder' => 'Nama Supplier'])}}
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
              <h6 class="ml-1"> Kode Supplier : {{$hdr->kodeSupplier}}</h6>
              <h6 class="ml-1"> Nama Supplier : {{$hdr->namaSupplier}}</h6>
              <h6 class="ml-1"> Jenis : {{$hdr->jenisSupplier}}</h6>
              <h6 class="ml-1"> Grand Total : {{$grandtotal}}</h6>
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
                          <td>{{$dt->noTransaksiBeli}}</td>
                          <td>{{$dt->periodeTransaksiBeli}}</td>
                          <td>{{$dt->tanggalTransaksiBeli}}</td>
                          <td>{{$dtl->kodeBarang}}</td>
                          <td>{{$dtl->namaBarang}}</td>
                          <td>{{$dtl->satuanBarang}}</td>
                          <td>{{$dtl->hargaSatuan}}</td>
                          <td>{{$dtl->quantity}}</td>
                          <td>{{$dtl->hargaTotal}}</td>
                          <td>{{$dt->discount."%"}}</td>
                          <td>{{$dtl->hargaTotal * (100-$dt->discount)/100}}</td>
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
@endsection