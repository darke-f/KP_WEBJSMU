@extends('layouts.admin')
@section('content')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <div class="container">
        <div>
            <h1>Transaksi Pembelian</h1>
            <form action="/pembelians" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('noTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="noTransaksiBeli">nomor Transaksi Beli</label>
                    <input type="text" class="form-control" id="noTransaksiBeli" name="noTransaksiBeli" placeholder="noTransaksiBeli" value="{{ old('noTransaksiBeli') }}">
                    @if($errors->has('noTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('noTransaksiBeli') }}</span>
                    @endif
                </div>
                <!-- <div class="form-group{{ $errors->has('tanggalTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiBeli">tanggalTransaksiBeli</label>
                    <input type="text" class="form-control" id="tanggalTransaksiBeli" name="tanggalTransaksiBeli" placeholder="tanggalTransaksiBeli" value="{{ old('tanggalTransaksiBeli') }}">
                    @if($errors->has('tanggalTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiBeli') }}</span>
                    @endif
                </div> -->
                <div class="form-group{{ $errors->has('tanggalTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="tanggalTransaksiBeli">Tanggal Transaksi Beli</label>
                    <div>
                        <input class="form-control" type="date" id="tanggalTransaksiBeli" name="tanggalTransaksiBeli">
                    </div>
                    @if($errors->has('tanggalTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiBeli') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeSupplier') ? ' has-error' : '' }}">
                    <label for="kodeSupplier">kodeSupplier</label>
                    <input type="text" class="form-control" id="kodeSupplier" name="kodeSupplier" placeholder="kodeSupplier" value="{{ old('kodeSupplier') }}">
                    @if($errors->has('kodeSupplier'))
                        <span class="help-block">{{ $errors->first('kode Supplier') }}</span>
                    @endif
                </div>


                <!-- ----dynamic_field---- -->
                <div id="dynamicInput"></div>                
                <div>
                    <button type="button" class="btn btn-success" onClick="addInput('dynamicInput');"> tambah barang</button>
                </div>

                <!-- ----dynamic_field---- -->
                <br>
                <p id="countitem"></p>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        var itr=0;
        var itemcount = 0;
        
        function removeInput(divname)
        {
            // alert("halo, "+divname+" akan dihapus");
            itemcount--;
            document.getElementById("countitem").innerHTML='Jumlah Barang : '+itemcount+'';
            $(divname).remove();
        }

        function addInput(divName)
        { 
            itr++;
            itemcount++;
            // $('#countitem').html('Jumlah Barang : '+itemcount+'');
            document.getElementById("countitem").innerHTML='Jumlah Barang : '+itemcount+'';
            var newid = 'newitem'+itr+'';
            var newitem = document.createElement('div');
            newitem.setAttribute('id', newid);
            document.getElementById(divName).appendChild(newitem);    

            var newdiv = document.createElement('div');
            newdiv.innerHTML = '<span>Barang '+itr+' :\t</span><button class="btn btn-danger" onClick="removeInput('+newid+');"> hapus barang</button>';
            document.getElementById(newid).appendChild(newdiv);    

            var newdiv = document.createElement('div');
            newdiv.setAttribute('class', 'row');
            newdiv.innerHTML = "<input type='text' class='form-control col-5' name='kodeBarang[]' placeholder='kodeBarang'><input type='text' class='form-control col-6' name='namaBarang[]' placeholder='namaBarang'>";
            document.getElementById(newid).appendChild(newdiv);       
            var newdiv = document.createElement('div');
            newdiv.setAttribute('class', 'row');
            newdiv.innerHTML = "<input type='text' class='form-control col-5' name='satuanBarang[]' placeholder='satuanBarang'><input type='text' class='form-control col-6' name='quantity[]' placeholder='quantity'>";
            document.getElementById(newid).appendChild(newdiv);    
        }


        $(document).ready(function(){    

            

            var postURL = "<?php echo url('pembelians'); ?>";
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