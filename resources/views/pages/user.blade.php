@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">User</a>
@endsection

@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Users</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List User</div></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Bagian</th>
                      <th data-sortable="false">Permsission Master</th>
                      <th data-sortable="false">Permsission Stock</th>
                      <th data-sortable="false">Permsission Pembelian</th>
                      <th data-sortable="false">Permsission Penjualan</th>
                      <th data-sortable="false">Permsission Report Pembelian</th>
                      <th data-sortable="false">Permsission Report Penjualan</th>
                      <th data-sortable="false">Modify</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Bagian</th>
                      <th>Permsission Master</th>
                      <th>Permsission Stock</th>
                      <th>Permsission Pembelian</th>
                      <th>Permsission Penjualan</th>
                      <th>Permsission Report Pembelian</th>
                      <th>Permsission Report Penjualan</th>
                      <th>Modify</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($users) >0)
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->bagian}}</td>
                            @if($user->masterperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            @if($user->stockperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            @if($user->pembelianperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            @if($user->penjualanperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            @if($user->reportbeliperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            @if($user->reportjualperm)
                              <td>Granted</td>
                            @else
                            <td>Denied</td>
                            @endif
                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary mr-2 mb-1">Edit</a></td>
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