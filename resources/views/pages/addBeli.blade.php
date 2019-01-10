@extends('layouts.admin')
@section('content')
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
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection