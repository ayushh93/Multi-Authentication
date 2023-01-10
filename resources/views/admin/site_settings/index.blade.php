@extends('admin.layout.admin')
@section('title') Site Setting @endsection
@section('main-content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Site Settings</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Site Settings</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Site Settings</h3>
                <a class="btn btn-primary cart-btn-transform pull-right"
                    href="{{ route('admin.site.edit',$site->id)}}">Edit</a>
            </div>
          @include('admin.layout.includes.message')
             <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Site Title:&nbsp{{$site->title}} </li>
                    <li class="list-group-item">Logo: &nbsp
                         @if(!empty($site->logo))
                        <img src="{{asset('uploads/logo/'.$site->logo)}}" alt="" srcset="" width="100%">
                        @else
                        <img src="{{asset('uploads/default/noimg.png')}}" alt="" srcset="" width="100%">
                        @endif</li>
                    <li class="list-group-item">Favicon:&nbsp
                        @if(!empty($site->favicon))
                        <img src="{{asset('uploads/logo/'.$site->favicon)}}" alt="" srcset="" width="100%">
                        @else
                        <img src="{{asset('uploads/default/noimg.png')}}" alt="" srcset="" width="100%">
                        @endif</li>
                    </li>
                </ul>
             </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection


    

