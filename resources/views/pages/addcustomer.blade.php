@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Create</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/mastercustomers">Data Customer</a>
            </li>
            <li class="breadcrumb-item active">Iput Customer</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tambah Customer Baru</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>'MasterCustomerController@store','method'=>'POST','enctype' =>'multipart/form-data']) !!}
                              <div class="form-group row">
                                {{form::label('kode','Kode',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('kodecustomer','',['class' =>'form-control here','placeholder' => 'Kode Customer'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('nama','Nama',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('nama','',['class' =>'form-control here','placeholder' => 'Nama'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('alamat','Alamat',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('alamat','',['class' =>'form-control here','placeholder' => 'Alamat'])}}
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