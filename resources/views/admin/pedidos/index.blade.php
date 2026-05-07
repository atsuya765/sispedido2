@extends('admin.layout.app')
@section('title', 'pedidos') 
@section('content') 
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalle - Pedidos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- @include('admin.platos.create') --}}
            </div>
        </div>
    </div>
</div>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h1 class="page-title">Pedidos</h1>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="example" class=" table no-wrap">
                        <thead class="bg-warning">
                            <tr>
                                <th style="width:5%;">#</th>
                                <th style="width:20%;">cliente</th>
                                <th style="width:30%;">total</th>
                                <th style="width:10%;">envio</th>  
                                <th style="width:10%;">estado</th>  
                                <th style="width:10%;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num =0
                            @endphp
                            @foreach ($orden as $row) 
                            @php
                                $num +=1
                            @endphp
                            <tr>
                                <td> {{$num }}</td>
                                <td> {{$row->nombre }}</td> 
                                <td> {{$row->total }}</td> 
                                <td> {{$row->envio }}</td>  
                                <td> 
                                    @if($row->estado==1)
                                    <span class="bg-danger text-white p-1 "
                                    style="border-radius:5px;">Por confirmar</span>
                                    @endif
                                </td>   
                                <td   class="p-3 d-flex justify-center">  
                                    <a  href="{{ route('arden.detalle', $row->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-filter"></i>Detalle</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div> 
    </div> 
</div>
 
@endsection