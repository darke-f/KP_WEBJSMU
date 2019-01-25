@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Create</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/masterbarangs">Data Barang</a>
            </li>
            <li class="breadcrumb-item active">Input Barang</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tambah Barang Baru</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>'MasterBarangController@store','method'=>'POST','enctype' =>'multipart/form-data']) !!}
                              <div class="form-group row">
                                {{form::label('kode','Kode',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('kodebarang','',['class' =>'form-control here','placeholder' => 'Kode Barang'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('nama','Nama',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('nama','',['class' =>'form-control here','placeholder' => 'Nama Barang'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('satuan','Satuan',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('satuan','',['class' =>'form-control here','placeholder' => 'Satuan Barang'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('note','Keterangan',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('note','',['class' =>'form-control here','placeholder' => 'Keterangan'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  {{form::submit('Submit',['class'=>'btn btn-primary'])}}
                                </div>
                              </div>
                            {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
@endsection