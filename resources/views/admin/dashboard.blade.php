@php
        $contacts = DB::table('contacts')->where('status',0)->get()->count();
@endphp

@extends('admin.layout.admin')
@section('title') Dashboard  @endsection
@section('main-content')
<div class="page-body">
    <div class="container-fluid">        
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Dashboard</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
    <div class="row">
       <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden">
          <a href="{{route('admin.contact.index')}}" target="_blank">
          <div class="bg-primary b-r-4 card-body match-height">
            <div class="media static-top-widget">
              <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
              <div class="media-body"><span class="m-0">Contact</span>
                <h4 class="mb-0 counter">{{$contacts}}</h4><i class="icon-bg" data-feather="message-circle"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>
   </div>
   <!-- Container-fluid ends-->
</div>

@endsection