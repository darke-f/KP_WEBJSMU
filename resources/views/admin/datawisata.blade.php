@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Wisata</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboardadmin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tempat Wisata</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tempat Wisata<a class="btn btn-primary float-right btn-sm" href="/adminwisatas/create">New</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>About</th>
                      <th>Hotels</th>
                      <th>Option<th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>About</th>
                      <th>Hotels</th>
                      <th>Option<th>
                    </tr>
                  </tfoot>
                  <tbody>
                    {{--@if(count($wisatas) >0)
                        @foreach($wisatas as $wisata)
                          <tr>
                            <td>{{$wisata->title}}</td>
                            <td>{{$wisata->detail}}</td>
                            <td>{{$wisata->hotel}}</td>
                            <td><div class="btn-group-vertical"><a href="/adminwisatas/{{$wisata->id}}/edit" class="btn btn-primary mr-2 mb-1">Edit</a>{!!Form::open(['action'=>['AdminwisataController@destroy',$wisata->id],'method' =>'POST','class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}</div></td>
                          </tr>
                        @endforeach
                    @endif--}}
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
@endsection