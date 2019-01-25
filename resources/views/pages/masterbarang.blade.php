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

          @include('inc.messages')

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Barang<a class="btn btn-primary float-right btn-sm" href="/masterbarangs/create">New</a></div></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Note</th>
                      <th data-sortable="false">Modify</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Note</th>
                      <th>Modify</th>
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
                            <td><div class="btn-group"><a href="/masterbarangs/{{$brg->kodeBarang}}/edit" class="btn btn-primary mr-2 mb-1">Edit</a>{!!Form::open(['action'=>['MasterBarangController@destroy',$brg->kodeBarang],'method' =>'POST','class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}</div></td>
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