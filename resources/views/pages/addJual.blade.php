@extends('layouts.admin')

@section('title')
    <a class="navbar-brand mr-1" href="#">Form Penjualan</a>
@endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

    <style>
        .select2 {
            width:100%!important;
        }
    </style>
@endsection 

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>

    <div class="container">
        <div>
            <h1>Transaksi Penjualan</h1>
            <form action="/penjualans" method="post" class="form1" onsubmit="return validate(this);">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('noTransaksiJual') ? ' is-invalid' : '' }}">
                    <label for="noTransaksiJual">Nomor Transaksi Jual</label>
                    <input type="text" class="form-control{{ $errors->has('noTransaksiJual') ? ' is-invalid' : '' }}" id="noTransaksiJual" name="noTransaksiJual" placeholder="noTransaksiJual" value="{{ old('noTransaksiJual') }}" autofocus required>
                    @if($errors->has('noTransaksiJual'))
                        <span class="alert">{{ $errors->first('noTransaksiJual') }}</span>
                    @endif
                </div>
                <!-- <div class="form-group{{ $errors->has('tanggalTransaksiJual') ? ' is-invalid' : '' }}">
                    <label for="tanggalTransaksiJual">tanggalTransaksiJual</label>
                    <input type="text" class="form-control" id="tanggalTransaksiJual" name="tanggalTransaksiJual" placeholder="tanggalTransaksiJual" value="{{ old('tanggalTransaksiJual') }}">
                    @if($errors->has('tanggalTransaksiJual'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiJual') }}</span>
                    @endif
                </div> -->
                <div class="form-group{{ $errors->has('tanggalTransaksiJual') ? ' is-invalid' : '' }}">
                    <label for="tanggalTransaksiJual">Tanggal Transaksi Jual</label>
                    <div>
                        <input class="form-control{{ $errors->has('tanggalTransaksiJual') ? ' is-invalid' : '' }}" type="date" id="tanggalTransaksiJual" name="tanggalTransaksiJual" value="{{ old('tanggalTransaksiJual') }}" required>
                    </div>
                    @if($errors->has('tanggalTransaksiJual'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiJual') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeCustomer') ? ' is-invalid' : '' }} cuss">
                    <label for="kodeCustomer">Nama Customer</label>
                    <select class="form-control selectform{{ $errors->has('kodeSupplier') ? ' is-invalid' : '' }}" id="kodeCustomer" name="kodeCustomer" value="{{ old('kodeCustomer') }}" required>
                        <option value="Balum Dipilih" selected disabled hidden>Pilih Customer:</option>
                        @if(count($customer) >0)
                            @foreach($customer as $ctm)
                                <option value ='{{$ctm->kodeCustomer}}'>{{$ctm->namaCustomer}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('kodeCustomer'))
                        <span class="help-block">{{ $errors->first('kodeCustomer') }}</span>
                    @endif
                    <span id="kodcus" class="kodcus">Kode Customer : belum dipilih<span>
                </div>


                <!-- ----dynamic_field---- -->
                            


                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="d-flex">
                            <th class="no">No.</th>
                            <th class="col-3 col-sm-2">Nama Barang</th>
                            <th class="col-1 col-sm-2">Kode Barang</th>
                            <th class="col-sm">Satuan</th>
                            <th class="col-sm">Kuantitas</th>
                            <th class="col-sm">Harga Satuan</th>
                            <th class="col-sm">Jumlah</th>
                            <th class="col-sm-1">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="resultbody">
                        <tr class="d-flex">
                            <td class="no">1</td>
                            <td class="col-sm-2">
                                <select id="pilihbarang0" class="form-control pilihbarang" name="namaBarang[]" required></select>
                                <input type="hidden" value="0" class="form-control indexH" name="indexH[]">
                                <input type="hidden" class="form-control namaBarangH" name="namaBarangH[]">
                            </td>
                            <td class="col-1.5">
                                <input disabled type="text" class="form-control kodeBarang" name="kodeBarang[]">
                                <input type="hidden" class="form-control kodeBarangH" name="kodeBarangH[]">
                            </td>
                            <td>
                                <input disabled type="text" class="form-control satuanBarang" name="satuanBarang[]">
                                <input type="hidden" class="form-control satuanBarangH" name="satuanBarangH[]">
                            </td>
                            <td>
                                <input type="number" min="0" value="0" class="form-control quantity" name="quantity[]">
                            </td>
                            <td>
                                <input type="text" id="satuanval0" value="0" class="form-control hargaSatuan" name="hargaSatuan[]">
                                <input type="hidden" value="0" class="form-control hargaSatuanH" name="hargaSatuanH[]">
                            </td>
                            <td>
                                <input disabled type="text" value="0" class="form-control hargaTotal" name="hargaTotal[]">
                                <input type="hidden" value="0" class="form-control hargaTotalH" name="hargaTotalH[]">
                            </td>
                            <td class="col-1">
                                <input type="button" class="btn btn-danger delete" value="x">
                            </td>
                        </tr>

                    </tbody>
                </table> 
                <!-- ----dynamic_field---- -->
                <p id="countitem"></p>
                <div>
                    <button type="button" class="btn btn-success add"> tambah barang</button>
                </div>
                <br>
                <p id="subtotal">Subtotal : 0</p>
                <input type="hidden" class="form-control subtotalH" name="subtotalH">
                <div class="row">  
                    <div class="col-2">
                        <label class="col-sm-1.5" for="discount">Discount (%) : </label>
                    </div>
                    <input type="number" value="0" class="form-control col-sm-1" id="discount" name="discount">
                </div>
                <p id="grandtotal">Grand Total : 0</p>
                <input type="hidden" class="form-control grandtotalH" name="grandtotalH">
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <script type="text/javascript">

        var ittr = 0;
        var sum = 0;
    
        var aunum = [];
        aunum.push(new AutoNumeric('.hargaSatuan'));
 
        var j = @php echo json_encode($barang); @endphp

        var options = '<option value="" selected disabled hidden>Pilih Barang:</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="'+i+'">' + j[i].namaBarang + '</option>';
        }
        $(".pilihbarang").html(options);    
        $(".pilihbarang").select2();

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('.cuss > .kodcus').html('Kode Customer :'+$('.selectform').val()+'');
        $('.selectform').select2();
        $(document).on('change','.selectform',function(){
               $('.cuss > .kodcus').html('Kode Customer :'+$(this).val()+'');
        });

        // $(document).on('change','.pilihbarang',function(){
        //        $(this).closest("input").html('Kode Customer :'+$(this).val());
        // });
        

        $('.add').click(function () {
            itemcount++;
            ittr++;
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr class="d-flex"><td class="no">' + n + '</td>' +
                    '<td class="col-sm-2"><select class="form-control pilihbarang" id="pilihbarang'+ittr+'" name="namaBarang[]" required></select>'+
                    '<input type="hidden" value="'+ittr+'" class="form-control indexH" name="indexH[]">'+
                    '<input type="hidden" class="form-control namaBarangH" name="namaBarangH[]"</td>'+
                    '<td class="col-sm-1.5"><input disabled type="text" class="form-control kodeBarang" name="kodeBarang[]"></td>'+
                    '<input type="hidden" class="form-control kodeBarangH" name="kodeBarangH[]"</td>'+
                    '<td><input disabled type="text" class="form-control satuanBarang" name="satuanBarang[]"></td>'+
                    '<input type="hidden" class="form-control satuanBarangH" name="satuanBarangH[]"</td>'+
                    '<td><input type="number" value="0" class="form-control quantity" name="quantity[]"></td>'+
                    '<td><input type="text" id="satuanval'+ittr+'" value="0" class="form-control hargaSatuan" name="hargaSatuan[]">'+
                    '<input type="hidden" value="0" class="form-control hargaSatuanH" name="hargaSatuanH[]"></td>'+
                    '<td><input disabled type="text" value="0" class="form-control hargaTotal" name="hargaTotal[]">'+
                    '<input type="hidden" value="0" class="form-control hargaTotalH" name="hargaTotalH[]"></td>'+
                    '<td class="col-sm-1"><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);
            $('#pilihbarang'+ittr+'').html(options);
            $('#pilihbarang'+ittr+'').select2();
            $('#pilihbarang'+ittr+'').focus();
            aunum.push(new AutoNumeric('#satuanval'+ittr+''));

        });

        $('.resultbody').delegate('.delete', 'click', function () {
            itemcount--;
            $(this).parent().parent().remove();
        });

        $('.resultbody').delegate('.pilihbarang', 'change', function () {
            // alert("hola");
            var tr = $(this).parent().parent();
            var barangselected = tr.find('.pilihbarang').val();
            // alert(barangselected);
            tr.find('.namaBarangH').val(j[barangselected].namaBarang);
            tr.find('.kodeBarang').val(j[barangselected].kodeBarang);
            tr.find('.kodeBarangH').val(j[barangselected].kodeBarang);
            tr.find('.satuanBarang').val(j[barangselected].satuanBarang);
            tr.find('.satuanBarangH').val(j[barangselected].satuanBarang);
        });

        $('.resultbody').delegate('.quantity, .hargaSatuan', 'change', function () {
            // alert("hola");
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val()-0;
            $idx = tr.find('.indexH').val()-0;
            var hargaSatuan = aunum[$idx].getNumericString();
            // alert(hargaSatuan);
            tr.find('.hargaSatuanH').val(hargaSatuan);
            var hargaTotal = quantity * hargaSatuan;
            // alert(hargaTotal);
            tr.find('.hargaTotal').val(numberWithCommas(hargaTotal));
            tr.find('.hargaTotalH').val(hargaTotal);
        });

        $('.resultbody').delegate('.hargaTotal, .quantity, .hargaSatuan', 'keyup, change', function () {
            sum = 0;
            $('.hargaTotalH').each(function(){
                sum+=$(this).val()-0;
            });
            // alert(sum);
            $('#subtotal').html("Subtotal : "+numberWithCommas(sum));
            $('#subtotal').val(sum);
            $('.subtotalH').val(sum);
            
            var disc = $('#discount').val()-0;
            var vara = sum;
            var reslt = vara - (vara * disc / 100);
            // alert(vara);
            $('#grandtotal').html("Grand Total : "+numberWithCommas(reslt));
            $('.grandtotalH').val(reslt);
        });

        $('.form1').delegate('#discount', 'keyup, change', function () {
            var disc = $(this).val()-0;
            var vara = sum;
            var reslt = vara - (vara * disc / 100);
            // alert(vara);
            $('#grandtotal').html("Grand Total : "+numberWithCommas(reslt));
            $('.grandtotalH').val(reslt);
        });


        var itr=0;
        var itemcount = 1;

        function validate(form) {
            if(!itemcount) {
                alert('There\'s no item!');
                return false;
            }
            else {
                return confirm('Do you really want to submit the form?');
            }
        }

    </script>
@endsection