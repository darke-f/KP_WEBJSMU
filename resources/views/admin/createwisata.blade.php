@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Create</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboardadmin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/adminwisatas">Tempat Wisata</a>
            </li>
            <li class="breadcrumb-item active">New Wisata</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>New Wisata</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>'AdminwisataController@store','method'=>'POST','enctype' =>'multipart/form-data']) !!}
                              <div class="form-group row">
                                {{form::label('title','Title',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('title','',['class' =>'form-control here','placeholder' => 'title'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('detail','About',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('detail','',['class' =>'form-control here','placeholder' => 'about'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('hotel','Hotel',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('hotel','',['class' =>'form-control here','placeholder' => 'hotel'])}}
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