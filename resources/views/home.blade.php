@extends('layouts.kss')

@section('content')
		
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">แผงควบคุมหลัก</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $waitingTotal }}</div>
                                    <div>          แจ้งเตือน!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/home/dashboard/waiting') }}">
                            <div class="panel-footer">
                                <span class="pull-left">สินค้ารอส่งซ่อม</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $waitingDealer }}</div>
                                    <div>          แจ้งเตือน!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/home/dashboard/dealer') }}">
                            <div class="panel-footer">
                                <span class="pull-left">สินค้าที่รับคืนจากผู้จำหน่าย</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $waitingReturn }}</div>
                                    <div>          แจ้งเตือน!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/home/dashboard/return') }}">
                            <div class="panel-footer">
                                <span class="pull-left">สินค้ารอส่งคืนลูกค้า</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>				
            </div>
        </div>
@endsection
