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

          {!! Form::open(['action'=> 'PembelianController@show_Periode','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group row ml-1">
              {{form::label('periode','Periode:',['class'=> 'col-3 col-form-label'])}}
              <div class="form-group mr-1 ml-1">
                {{form::selectMonth('month')}}
              </div>
              <div Wclass="form-group">
                {{form::selectRange('year', 2019, 2050)}}
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-1 col-8">
                {{form::submit('Submit',['class'=>'btn btn-primary'])}}
              </div>
            </div>
          {!! Form::close() !!} 

          @if(isset($data) && count($data)>0)
            <h6 class="ml-1"> Periode Transaksi : {{$periode}}</h6>
            <h6 class="ml-1"> Grand Total : {{number_format($grandtotal)}}</h6>
          @elseif(isset($nodata))
            <div class="alert alert-danger col-sm-2" role="alert">
              Data transaksi tidak ditemukan!
            </div>
          @endif

          <br>

          @if(isset($data))
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
                        <th>Tanggal Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                        <th>Diskon</th>
                        <th>PPN</th>
                        <th>Harga Akhir</th>
                        <th>Supplier</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                        <th>Diskon</th>
                        <th>PPN</th>
                        <th>Harga Akhir</th>
                        <th>Supplier</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $dt)
                      @foreach($dt->dtl as $dtl)
                      <tr>
                        <td>{{$dt->noTransaksiBeli}}</td>
                        <td>{{$dt->tanggalTransaksiBeli}}</td>
                        <td>{{$dtl->kodeBarang}}</td>
                        <td>{{$dtl->namaBarang}}</td>
                        <td>{{$dtl->satuanBarang}}</td>
                        <td>{{number_format($dtl->hargaSatuan)}}</td>
                        <td>{{$dtl->quantity}}</td>
                        <td>{{number_format($dtl->hargaTotal)}}</td>
                        <td>{{$dt->discount."%"}}</td>
                        <td>{{$dt->ppn."%"}}</td>
                        <td>{{number_format($dtl->hargaTotal * ((100-$dt->discount)/100) * ((100+$dt->ppn)/100))}}</td>
                        <td>{{$dt->supplier->namaSupplier}}</td>
                      </tr>
                      @endforeach
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @endif
@endsection