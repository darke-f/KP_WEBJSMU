@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Event</a>
@endsection

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboardadmin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">List Event</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Event<a class="btn btn-primary float-right btn-sm" href="/adminevents/create">New</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>About</th>
                      <th>Option<th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>About</th>
                      <th>Option<th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @if(count($events) >0)
                        @foreach($events as $event)
                         <tr>
                            <td>{{$event->title}}</td>
                            <td>{{$event->detail}}</td>
                            <td><div class="btn-group-vertical"><a href="/adminevents/{{$event->id}}/edit" class="btn btn-primary mr-2 mb-1">Edit</a>{!!Form::open(['action'=>['AdmineventController@destroy',$event->id],'method' =>'POST','class' => 'pull-right'])!!}
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

        </div>
@endsection