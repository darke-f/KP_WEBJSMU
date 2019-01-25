@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">User Settings</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/users">Users</a>
            </li>
            <li class="breadcrumb-item active">Permissions</li>
      </ol>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Permissions for {{$users->username}}</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action'=>['PagesController@updatepermission',$users->id],'method'=>'POST']) !!}
                              <div class="form-group row ml-2">
                                <input type="checkbox" name="masterperm" value=1 class="mr-1"
                                @if( $users->masterperm )
                                      checked="1"
                                @endif />Master
                                <input type="checkbox" name="stockperm" value=1 class="ml-4 mr-1"
                                @if( $users->stockperm )
                                      checked="1"
                                @endif />Stock
                                <input type="checkbox" name="pembelianperm" value=1 class="ml-4 mr-1"
                                @if( $users->pembelianperm )
                                      checked="1"
                                @endif />Pembelian
                                <input type="checkbox" name="penjualanperm" value=1 class="ml-4 mr-1"
                                @if( $users->penjualanperm )
                                      checked="1"
                                @endif />Penjualan
                                <input type="checkbox" name="reportbeliperm" value=1 class="ml-4 mr-1"
                                @if( $users->reportbeliperm )
                                      checked="1"
                                @endif />Report Pembelian
                                <input type="checkbox" name="reportjualperm" value=1 class="ml-4 mr-1"
                                @if( $users->reportjualperm )
                                      checked="1"
                                @endif />Report Penjualan
                              </div>
                              <div class="form-group row">
                                <div class="col-8">
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