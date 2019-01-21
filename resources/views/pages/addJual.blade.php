@extends('layouts.admin')

@section('title')
    <a class="navbar-brand mr-1" href="#">Form Penjualan</a>
@endsection

@section('head')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection 

@section('content')
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
                <div class="form-group{{ $errors->has('noTransaksiJual') ? ' has-error' : '' }}">
                    <label for="noTransaksiJual">Nomor Transaksi Jual</label>
                    <input type="text" class="form-control" id="noTransaksiJual" name="noTransaksiJual" placeholder="noTransaksiJual" value="{{ old('noTransaksiJual') }}" autofocus required>
                    @if($errors->has('noTransaksiJual'))
                        <span class="alert">{{ $errors->first('noTransaksiJual') }}</span>
                    @endif
                </div>
                <!-- <div class="form-group{{ $errors->has('tanggalTransaksiJual') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiJual">tanggalTransaksiJual</label>
                    <input type="text" class="form-control" id="tanggalTransaksiJual" name="tanggalTransaksiJual" placeholder="tanggalTransaksiJual" value="{{ old('tanggalTransaksiJual') }}">
                    @if($errors->has('tanggalTransaksiJual'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiJual') }}</span>
                    @endif
                </div> -->
                <div class="form-group{{ $errors->has('tanggalTransaksiJual') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiJual">Tanggal Transaksi Jual</label>
                    <div>
                        <input class="form-control" type="date" id="tanggalTransaksiJual" name="tanggalTransaksiJual" value="{{ old('tanggalTransaksiJual') }}" required>
                    </div>
                    @if($errors->has('tanggalTransaksiJual'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiJual') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeCustomer') ? ' has-error' : '' }} cuss">
                    <label for="kodeCustomer">Nama Customer</label>
                    <select class="form-control selectform" id="kodeCustomer" name="kodeCustomer" value="{{ old('kodeCustomer') }}" required>
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
                            


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Satuan</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="resultbody">
                        <tr>
                            <td class="no">1</td>
                            <td class="col-2">
                                <select id="pilihbarang0" class="form-control pilihbarang" name="namaBarang[]" required></select>
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
                                <input type="number" value="0" class="form-control quantity" name="quantity[]">
                            </td>
                            <td>
                                <input type="number" value="0" class="form-control hargaSatuan" name="hargaSatuan[]">
                            </td>
                            <td>
                                <input type="number" value="0" class="form-control hargaTotal" name="hargaTotal[]">
                            </td>
                            <td class="col-1">
                                <input type="button" class="btn btn-danger delete" value="x">
                            </td>
                        </tr>

                    </tbody>
                </table> 
                <!-- ----dynamic_field---- -->
                <br>
                <p id="countitem"></p>
                <div>
                    <button type="button" class="btn btn-success add"> tambah barang</button>
                </div>
                <p id="subtotal">Subtotal : 0</p>
                <input type="hidden" class="form-control subtotalH" name="subtotalH">
                <div class="row">  
                    <div class="col-2">
                        <label class="col-1.5" for="discount">Discount (%) : </label>
                    </div>
                    <input type="number" value="0" class="form-control col-1" id="discount" name="discount">
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
    
        $('.cuss > .kodcus').html('Kode Customer :'+$('.selectform').val()+'');
 
        var j = @php echo json_encode($barang); @endphp

        var options = '<option value="" selected disabled hidden>Pilih Barang:</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="'+i+'">' + j[i].namaBarang + '</option>';
        }
        $(".pilihbarang").html(options);    
        // $(".pilihbarang").select2();


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
            var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td class="col-2"><select class="form-control pilihbarang" id="pilihbarang'+ittr+'" name="namaBarang[]" required></select>'+
                    '<input type="hidden" class="form-control namaBarangH" name="namaBarangH[]"</td>'+
                    '<td class="col-1.5"><input disabled type="text" class="form-control kodeBarang" name="kodeBarang[]"></td>'+
                    '<input type="hidden" class="form-control kodeBarangH" name="kodeBarangH[]"</td>'+
                    '<td><input disabled type="text" class="form-control satuanBarang" name="satuanBarang[]"></td>'+
                    '<input type="hidden" class="form-control satuanBarangH" name="satuanBarangH[]"</td>'+
                    '<td><input type="number" value="0" class="form-control quantity" name="quantity[]"></td>'+
                    '<td><input type="number" value="0" class="form-control hargaSatuan" name="hargaSatuan[]"></td>'+
                    '<td><input type="number" value="0" class="form-control hargaTotal" name="hargaTotal[]"></td>'+
                    '<td class="col-1"><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);
            $('#pilihbarang'+ittr+'').html(options);
            $('#pilihbarang'+ittr+'').focus();

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

        $('.resultbody').delegate('.quantity, .hargaSatuan', 'keyup, change', function () {
            // alert("hola");
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val()-0;
            var hargaSatuan = tr.find('.hargaSatuan').val()-0;
            // alert(hargaSatuan);
            tr.find('.hargaTotal').val(quantity*hargaSatuan);
        });

        $('.resultbody').delegate('.hargaTotal, .quantity, .hargaSatuan', 'keyup, change', function () {
            sum = 0;
            $('.hargaTotal').each(function(){
                sum+=$(this).val()-0;
            });
            // alert(sum);
            $('#subtotal').html("Subtotal : "+sum);
            $('#subtotal').val(sum);
            $('.subtotalH').val(sum);
            
            var disc = $('#discount').val()-0;
            var vara = sum;
            var reslt = vara - (vara * disc / 100);
            // alert(vara);
            $('#grandtotal').html("Grand Total : "+reslt);
            $('.grandtotalH').val(reslt);
        });

        $('.form1').delegate('#discount', 'keyup, change', function () {
            var disc = $(this).val()-0;
            var vara = sum;
            var reslt = vara - (vara * disc / 100);
            // alert(vara);
            $('#grandtotal').html("Grand Total : "+reslt);
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