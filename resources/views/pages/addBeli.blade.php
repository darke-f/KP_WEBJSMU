@extends('layouts.admin')
@section('content')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <div class="container">
        <div>
            <h1>Transaksi Pembelian</h1>
            <form action="/pembelians" method="post" onsubmit="return validate(this);">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('noTransaksiBeli') ? ' has-error' : '' }}">
                    <label for="noTransaksiBeli">Nomor Transaksi Beli</label>
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
                        <input class="form-control" type="date" id="tanggalTransaksiBeli" name="tanggalTransaksiBeli" value="{{ old('tanggalTransaksiBeli') }}">
                    </div>
                    @if($errors->has('tanggalTransaksiBeli'))
                        <span class="help-block">{{ $errors->first('tanggalTransaksiBeli') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('kodeSupplier') ? ' has-error' : '' }}">
                    <label for="kodeSupplier">Kode Supplier</label>
                    <input type="text" class="form-control" id="kodeSupplier" name="kodeSupplier" placeholder="kodeSupplier" value="{{ old('kodeSupplier') }}">
                    @if($errors->has('kodeSupplier'))
                        <span class="help-block">{{ $errors->first('kode Supplier') }}</span>
                    @endif
                </div>


                <!-- ----dynamic_field---- -->
                <datalist id="namabarang">
                @if(count($barang) >0)
                    @foreach($barang as $brg)
                        <option value={{$brg->namaBarang}}>
                    @endforeach
                @endif
                </datalist>
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

        function validate(form) {
            if(!itemcount) {
                alert('There\'s no item!');
                return false;
            }
            else {
                return confirm('Do you really want to submit the form?');
            }
        }
        
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
            newdiv.innerHTML = "<input type='text' class='form-control col-5' name='kodeBarang[]' placeholder='kodeBarang'><input list='namabarang' class='form-control col-6' name='namaBarang[]' placeholder='namaBarang'>";
            document.getElementById(newid).appendChild(newdiv);       
            var newdiv = document.createElement('div');
            newdiv.setAttribute('class', 'row');
            newdiv.innerHTML = "<input type='text' class='form-control col-5' name='satuanBarang[]' placeholder='satuanBarang'><input type='number' class='form-control col-6' name='quantity[]' placeholder='quantity'>";
            document.getElementById(newid).appendChild(newdiv);    
            var breakline = document.createElement('br');
            document.getElementById(newid).appendChild(breakline);
        }

    </script>



@endsection