<div id="noTrans">
    <p id="noTransaksiJual">{{$header[0]->noTransaksiJual}}</p>
    <p id="noPPB">{{$header[0]->noPPB}}</p>
</div>
<!-- <p id="tanggalTransaksiJual">{{$header[0]->tanggalTransaksiJual}}</p> -->
<div id="customer">
    <strong style="font-size:24px;" id="namaCustomer">{{$customer->namaCustomer}}</strong>
    <p id="alamatCustomer">{{$customer->alamatCustomer}}</p>
    <p id="kotaCustomer">{{$customer->kotaCustomer}}</p>
</div>
<p id="tanggalKirim">{{$header[0]->tanggalKirim}}</p>

@php $counter = 1; @endphp

<div id="detailtable">
<table>
@foreach($detail as $dtl)
<tr>
    <td width="5" align="right" class="no" style="padding-right:20px">{{$counter}}</td>
    <td width="200" align="left" class="namaBarang">{{$dtl->namaBarang}}</td>
    <!-- <td width="20" class="satuanBarang">{{$dtl->satuanBarang}}</td> -->
    <td width="130" align="right" class="quantity">{{$dtl->quantity}}</td>
    <td width="110" align="right" class="hargaSatuan">{{number_format($dtl->hargaSatuan,2,",",".")}}</td> 
    <td width="100" align="right" class="hargaTotal">{{number_format($dtl->hargaTotal,2,",",".")}}</td>
</tr>
@php $counter++; @endphp
@endforeach

</table>
</div>

<div id="subtotaldkk">
<table>
    <tr>
        <td style="padding-bottom: 9px" width="190" ></td>
        <td style="padding-bottom: 9px" width="180" align="right">{{number_format($header[0]->subtotal,2,",",".")}}</td>
    </tr>
    <tr>
        <td style="padding-bottom: 9px" width="190" align="right">{{$header[0]->discount}}</td>
        <td style="padding-bottom: 9px" width="180" align="right">{{number_format(($header[0]->discount * $header[0]->subtotal / 100),2,",",".")}}</td>
    </tr>
    <tr>
        <td style="padding-bottom: 9px" width="190" ></td>
        <td style="padding-bottom: 9px" width="180" align="right">{{number_format($header[0]->total,2,",",".")}}</td>
    </tr>
    <tr>
        <td style="padding-bottom: 9px" width="190" align="right">{{$header[0]->ppn}}</td>
        <td style="padding-bottom: 9px" width="180" align="right">{{number_format(($header[0]->ppn * $header[0]->total / 100),2,",",".")}}</td>
    </tr>
    <tr>
        <td style="padding-bottom: 9px" width="190" ></td>
        <td style="padding-bottom: 9px" width="180" align="right">{{number_format($header[0]->grandtotal,2,",",".")}}</td>
    </tr>
</table>
</div>



<style>

#noTrans {
    position: absolute;
    top: 65px;
}

#noTransaksiJual {
    /* border: 3px solid #73AD21; */
    margin-left : 160px;
    display:inline
}

#noPPB {
    right: 0px;
    margin-left : 400px;
    /* border: 3px solid #730021; */
    display: inline;
}

#customer {
    position: absolute;
    margin-left : 130px;
    top: 105px;
    /* border: 3px solid #73AA21; */
    display: inline;
}

#tanggalKirim {
    position: absolute;
    margin-left : 130px;
    top: 255px;
    /* border: 3px solid #73AA21; */
    display: inline;
}

#detailtable {
    position: absolute;
    top: 350px;
    /* border: 3px solid #FFAA21; */
    display: inline;
}

.no {
    
}

.namaBarang {
    
}

.satuanBarang {
}

.quantity {
    
}

.hargaSatuan {
    right: 0px;
    
}

.hargaTotal {
    right: 0px;
    
}

#subtotaldkk {
    position: absolute;
    top: 895px;
    left: 270px:
    border: 3px solid #FFAA21;
    display: inline-block;
}
</style>