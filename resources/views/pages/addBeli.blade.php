@extends('layouts.admin')
@section('content')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <div class="container">
        <div class="row">
            <h1>Transaksi Pembelian</h1>
            <form action="/pembelians" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('noTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="noTransaksiBeli">noTransaksiBeli</label>
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
                    <label for="tanggalTransaksiBeli">tanggalTransaksiBeli</label>
                    <div class="col-10">
                        <input class="form-control" type="date" id="tanggalTransaksiBeli" name="tanggalTransaksiBeli">
                    </div>
                    @if($errors->has('tanggalTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiBeli') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeSupplier') ? ' has-error' : '' }}">
                    <label for="kodeSupplier">kodeSupplier</label>
                    <textarea class="form-control" id="kodeSupplier" name="kodeSupplier" placeholder="kodeSupplier">{{ old('kodeSupplier') }}</textarea>
                    @if($errors->has('kodeSupplier'))
                        <span class="help-block">{{ $errors->first('kodeSupplier') }}</span>
                    @endif
                </div>


                <!-- ----dynamic_field---- -->


                <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
                </div>

                <div class="table-responsive">  
                    <table class="table table-bordered" id="dynamic_field">  
                        <tr>  
                            <td><input type="text" name="kodeBarang[]" placeholder="Kode Barang" class="form-control name_list" /></td>  
                            <td><input type="text" name="namaBarang[]" placeholder="Nama Barang" class="form-control name_list" /></td>  
                            <td><input type="text" name="quantity[]" placeholder="quantity" class="form-control name_list" /></td>  
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                        </tr>  
                    </table>  
                </div>

                <!-- ----dynamic_field---- -->

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){      
            var postURL = "<?php echo url('pembelians'); ?>";
            var i=1;  

            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="namaBarang[]" placeholder="Nama Barang" class="form-control name_list" /></td> <td><input type="text" name="quantity[]" placeholder="quantity" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
            });  

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
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