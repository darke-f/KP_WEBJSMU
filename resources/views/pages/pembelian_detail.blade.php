@extends('layouts.admin')

@section('title')
        <a class="navbar-brand mr-1" href="#">Data Pembelian</a>
@endsection

@section('head')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection 


@section('content')
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Data Pembelian</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <h2 class="ml-1 mb-3"> Data pembelian :</h2>

          @if(isset($header) && count($header)>0)
            @foreach($header as $hdr)
              <h6 class="ml-1"> No Transaksi : {{$hdr->noTransaksiBeli}}</h6>
              <h6 class="ml-1"> Periode Transaksi : {{$hdr->periodeTransaksiBeli}}</h6>
              <h6 class="ml-1"> Tanggal Transaksi : {{$hdr->tanggalTransaksiBeli}}</h6>
              <h6 class="ml-1"> Supplier : {{$supplier}}</h6>
              <h6 class="ml-1"> Subtotal : {{number_format($hdr->subtotal)}}</h6>
              <h6 class="ml-1"> Diskon : {{$hdr->discount."%"}}</h6>
              <h6 class="ml-1"> Total : {{number_format($hdr->total)}}</h6>
              <h6 class="ml-1"> PPN : {{$hdr->ppn."%"}}</h6>
              <h6 class="ml-1"> Grand Total : {{number_format($hdr->grandtotal)}}</h6>
              <div class="btn-group">
                <a href="/pembelians/{{$hdr->noTransaksiBeli}}/edit" class="btn btn-primary mr-2 mb-1">Edit</a>
                <a target="_blank" rel="noopener noreferrer" href="/pembelians/{{$hdr->noTransaksiBeli}}/print" class="btn btn-primary mr-2 mb-1">Print</a>
              </div>
            @endforeach
          @elseif(isset($nodata))
            <div class="alert alert-danger col-sm-2" role="alert">
              Data transaksi tidak ditemukan!
            </div>
          @endif

          <br>
          <br>

          @if(isset($hdr))
            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Pembelian
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @if(isset($detail))
                        @foreach($detail as $dtl)
                          <tr>
                              <td>{{$dtl->kodeBarang}}</td>
                              <td>{{$dtl->namaBarang}}</td>
                              <td>{{$dtl->satuanBarang}}</td>
                              <td>{{number_format($dtl->hargaSatuan)}}</td>
                              <td>{{$dtl->quantity}}</td>
                              <td>{{number_format($dtl->hargaTotal)}}</td>
                          </tr>
                        @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @endif


    <script type="text/javascript">
      $('.selectform').select2();
    </script>
@endsection