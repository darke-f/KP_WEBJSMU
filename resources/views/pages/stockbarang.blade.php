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

          <h2 class="ml-1"> Data Stock pada : </h2>

          {!! Form::open(['action'=> 'StockController@showTable','method'=>'GET','class' =>'form-inline ml-1 mb-4']) !!}
            <div class="form-group mr-1 ml-1">
              {{form::selectMonth('month')}}
            </div>
            <div class="form-group mr-1 ml-1">
              {{form::selectRange('year', 2019, 2050)}}
            </div>
            {{form::submit('Submit',['class'=>'btn btn-default ml-1'])}}
          </form>
          {!! Form::close() !!} 

          <!-- DataTables Example -->
          @if(isset($stock))
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                @if(isset($month)&&isset($year))
                  Stock Barang {{$month . " " . $year}}
                @else
                  Stock Barang
                @endif
                @if(isset($flag_button) && $flag_button && $month!='Dec')
                  <a class="btn btn-primary float-right btn-sm" href="/stocktable/closemonth/{{$month}}&{{$year}}">Tutup Bulan</a>
                  <a class="btn btn-primary float-right btn-sm mr-2" href="/stocktable/calc/{{$month}}&{{$year}}">Kalkulasi</a>
                @elseif(isset($flag_button) && $flag_button && $month=='Dec')
                  <a class="btn btn-primary float-right btn-sm" href="/stocktable/closeyear/{{$month}}&{{$year}}">Tutup Tahun</a>
                  <a class="btn btn-primary float-right btn-sm mr-2" href="/stocktable/calc/{{$month}}&{{$year}}">Kalkulasi</a>
                @endif
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
                      @if(count($stock)>0)
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
          @endif
@endsection