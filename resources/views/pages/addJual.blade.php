@extends('layouts.admin')
@section('content')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <div class="container">
        <div class="row">
            <h1>Transaksi Penjualan</h1>
            <form action="/penjualans" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('noTransaksiJual') ? ' has-error' : '' }}">
                    <label for="noTransaksiJual">noTransaksiJual</label>
                    <input type="text" class="form-control" id="noTransaksiJual" name="noTransaksiJual" placeholder="noTransaksiJual" value="{{ old('noTransaksiJual') }}">
                    @if($errors->has('noTransaksiJual'))
                        <span class="help-block">{{ $errors->first('noTransaksiJual') }}</span>
                    @endif
                </div>
                <!-- <div class="form-group{{ $errors->has('tanggalTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiBeli">tanggalTransaksiBeli</label>
                    <input type="text" class="form-control" id="tanggalTransaksiBeli" name="tanggalTransaksiBeli" placeholder="tanggalTransaksiBeli" value="{{ old('tanggalTransaksiBeli') }}">
                    @if($errors->has('tanggalTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiBeli') }}</span>
                    @endif
                </div> -->
                <div class="form-group{{ $errors->has('tanggalTransaksiJual') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiJual">tanggalTransaksiJual</label>
                    <div class="col-10">
                        <input class="form-control" type="date" id="tanggalTransaksiJual" name="tanggalTransaksiJual">
                    </div>
                    @if($errors->has('tanggalTransaksiJual'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiJual') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeCustomer') ? ' has-error' : '' }}">
                    <label for="kodeCustomer">kodeCustomer</label>
                    <textarea class="form-control" id="kodeCustomer" name="kodeCustomer" placeholder="kodeCustomer">{{ old('kodeCustomer') }}</textarea>
                    @if($errors->has('kodeCustomer'))
                        <span class="help-block">{{ $errors->first('kodeCustomer') }}</span>
                    @endif
                </div>


                <!-- ----dynamic_field---- -->

                <div id="dynamicInput">
                    <span class="glyphicon glyphicon-plus" onClick="addInput('dynamicInput');"> tambah barang</span>
                </div>

                <!-- ----dynamic_field---- -->

                <button id="submit" type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        var itr=0;
        
        function removeInput(divname)
        {
            // alert("halo, "+divname+" akan dihapus");
            $(divname).remove();
        }

        function addInput(divName)
        { 
            itr++;
            var newid = 'newitem'+itr+'';
            var newitem = document.createElement('div');
            newitem.setAttribute('id', newid);
            document.getElementById(divName).appendChild(newitem);    

            var newdiv = document.createElement('div');
            newdiv.innerHTML = '<span class="glyphicon glyphicon-minus" onClick="removeInput('+newid+');"> hapus barang</span>';
            document.getElementById(newid).appendChild(newdiv);    

            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<input type='text' name='kodeBarang[]' placeholder='kodeBarang'>";
            document.getElementById(newid).appendChild(newdiv);    
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<input type='text' name='namaBarang[]' placeholder='namaBarang'>";
            document.getElementById(newid).appendChild(newdiv);    
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<input type='text' name='satuanBarang[]' placeholder='satuanBarang'>";
            document.getElementById(newid).appendChild(newdiv);    
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<input type='text' name='quantity[]' placeholder='quantity'>";
            document.getElementById(newid).appendChild(newdiv);    
        }


        $(document).ready(function(){    

            

            var postURL = "<?php echo url('penjualans'); ?>";
            var i=1;  

            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="namaBarang[]" placeholder="Nama Barang" class="form-control name_list" /></td> <td><input type="text" name="satuanBarang[]" placeholder="Satuan Barang" class="form-control name_list" /></td> <td><input type="text" name="quantity[]" placeholder="quantity" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
            });  

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });  

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });  
    </script>



@endsection