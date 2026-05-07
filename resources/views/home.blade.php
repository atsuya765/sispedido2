@extends('admin.layout.app')
@section('title', 'dashboard')

@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Registros</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info bg-primary text-white">
                    <h3 class="box-title">TOTAL DE CLIENTES</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto">
                            <span class="counter text-white"> <i class="fa fa-users" aria-hidden="true">&nbsp;&nbsp;</i>
                                {{ count($clientes) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info bg-info text-white">
                    <h3 class="box-title">TOTAL DE VENTAS</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto">
                            <span class="counter text-white"> <i class="fa fa-shopping-cart" aria-hidden="true">&nbsp;&nbsp;
                                </i>{{ count($ventas) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info bg-success text-white">
                    <h3 class="box-title">TOTAL DE PLATOS</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto">
                            <span class="counter text-white"><i class="fa fa-product-hunt"
                                    aria-hidden="true"></i>&nbsp;&nbsp; {{ count($platos) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-contetn-center">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            
          </div>
          <div class="col-md-2"></div>
        </div>

    </div>
@endsection
