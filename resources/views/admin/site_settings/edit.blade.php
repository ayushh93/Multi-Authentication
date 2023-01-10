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
              <li class="breadcrumb-item"><a href="{{route('admin.site.index')}}">Site Settings</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
          <div class="card-header">
            <h5>Edit Site Setting</h5>
          </div> 
          @include('admin.layout.includes.message')
          <form class="form theme-form" method="post" action="{{route('admin.site.update',$site->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="title">Site Title</label>
                    <input class="form-control" name="title" type="text" placeholder="Site title" value="{{$site->title}}" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="logo">Logo</label>
                        <div class="inner-form">
                          <input class="form-control w-25" id="image-input" name="logo" type="file"
                          accept="image/*" onchange="readURL(this);">
                        {{-- display image on upload  --}} 
                        @if(!empty($site->logo))
                          <img src="{{asset('uploads/logo/'. $site->logo)}}" class="display-img" alt="" srcset="" id="img-change">
                          @else
                          <img src="{{asset('uploads/default/noimg.png')}}" class="display-img" alt="" srcset="" id="img-change">
                          @endif
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="favicon">Favicon</label>
                        <div class="inner-form">
                          <input class="form-control w-25" id="favicon-input" name="favicon" type="file"
                          accept="image/*" onchange="readURL2(this);">
                        {{-- display image on upload  --}} 
                        @if(!empty($site->favicon))
                          <img src="{{asset('uploads/logo/'.$site->favicon)}}" class="display-img" alt="" srcset="" id="img-change2">
                          @else
                          <img src="{{asset('uploads/default/noimg.png')}}" class="display-img" alt="" srcset="" id="img-change2">
                          @endif
                      </div>
                    
                  </div>
                </div>
              </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit">Update</button>
              <input class="btn btn-light" type="reset" value="Cancel">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection

@section('js')
<script>
  function readURL(input){
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function(e) {
               $('#img-change')
                   .attr('src', e.target.result)
                   .width(100)
           };
           reader.readAsDataURL(input.files[0]);
       }
   }
</script>
<script>
    function readURL2(input){
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 $('#img-change2')
                     .attr('src', e.target.result)
                     .width(100)
             };
             reader.readAsDataURL(input.files[0]);
         }
     }
  </script>
@endsection


    

