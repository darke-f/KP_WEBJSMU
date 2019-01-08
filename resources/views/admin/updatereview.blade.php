@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Update</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboardadmin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/adminreviews">Review</a>
            </li>
            <li class="breadcrumb-item active">Update Review</li>
          </ol>

          <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Update Review</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>['AdminreviewController@update',$post->id],'method'=>'POST']) !!}
                              <div class="form-group row">
                                {{form::label('title','Title',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('title',$post->title,['class' =>'form-control here','placeholder' => 'title'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('name','Name',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('name',$post->name,['class' =>'form-control here','placeholder' => 'name'])}}
                                </div>
                              </div>
                              <div class="form-group row">
                                {{form::label('detail','Detail',['class'=> 'col-4 col-form-label'])}}
                                <div class="col-8">
                                  {{form::text('detail',$post->detail,['class' =>'form-control here','placeholder' => 'detail'])}}
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