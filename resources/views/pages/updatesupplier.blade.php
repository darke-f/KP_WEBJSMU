@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Update</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mastersuppliers">Data Supplier</a>
            </li>
            <li class="breadcrumb-item active">Edit Supplier</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Update Data Supplier</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>['MasterSupplierController@update',$supplier->kodeSupplier],'method'=>'POST']) !!}
                              <div class="form-group row">
                                {{form::label('nama','Nama',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('nama',$supplier->namaSupplier,['class' =>'form-control here','placeholder' => 'Nama'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('alamat','Alamat',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('alamat',$supplier->alamatSupplier,['class' =>'form-control here','placeholder' => 'Alamat'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('kota','Kota',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('kota',$supplier->kotaSupplier,['class' =>'form-control here','placeholder' => 'Kota'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('jenis','Jenis',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('jenis',$supplier->jenisSupplier,['class' =>'form-control here','placeholder' => 'Jenis'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  {{form::hidden('_method','PUT')}}
                                  {{form::submit('Submit',['class'=>'btn btn-primary'])}}
                                </div>
                              </div>
                            {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
@endsection