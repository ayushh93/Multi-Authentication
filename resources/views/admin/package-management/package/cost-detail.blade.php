@extends('admin.layout.admin')
@section('title')
    Cost Details - {{ $site->title }}
@endsection
@section('main-content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3> Cost Details</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.package.packages.index') }}">Packages</a>
                            </li>
                            <li class="breadcrumb-item active"> Cost Details</li>
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
                            <h5>Add Cost Details</h5>
                            <div class="row pt-4">
                                <div class="col-md-7">
                                    <ul class="package-details-list">
                                        <li>Package: <span class="package-name">{{ $package->title }}</span></li>
                                        <li>Category: <span class="category-name">
                                                @if (!empty($package->subcategory->category))
                                                    {{ $package->subcategory->category->title }}
                                                @else
                                                    Uncategorised
                                                @endif
                                            </span>
                                        </li>
                                        <li>Category: <span class="category-name">
                                                @if (!empty($package->subcategory))
                                                    {{ $package->subcategory->title }}
                                                @else
                                                    Uncategorised
                                                @endif
                                            </span></li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    @if (!empty($package->image))
                                        <img src="{{ asset('uploads/package/images/' . $package->image) }}"
                                            alt="Package Image" class="img-fluid">
                                    @else
                                        <img src="{{ asset('uploads/default/noimg.png') }}" alt="Package Image"
                                            class="img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                        @include('admin.layout.includes.message')
                        <form action="{{ route('admin.package.storecostdetail') }}" method="post"
                            enctype="multipart/form-data" class="mt-5 ml-5 mb-3">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <div class="control-group ">
                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label" for="from">From</label>
                                            <input type="number" name="from[]" placeholder="Eg:1"
                                                class="form-control p-2" value="{{ old('from[]') }}" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label" for="to">To</label>
                                            <input type="number" name="to[]" placeholder="Eg:20"
                                                class="form-control p-2" value="{{ old('to[]') }}" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label" for="cost">Cost</label>
                                            <input type="number" name="cost[]" placeholder="Eg:20000"
                                                class="form-control p-2" value="{{ old('cost[]') }}" required />
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                                <img src="{{ asset('uploads/default/plus-green.svg') }}" /></a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <input class="btn btn-light" type="reset" value="Cancel">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="card-body">
                            <div class="card-header pt-0 d-flex justify-content-between">
                                <h3>Cost Details</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="display" id="data-source-1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Cost</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($costdetails as $item)
                                        <tr>
                                            <td> {{ $loop->index + 1 }}</td>
                                            <form action="{{ route('admin.package.updatecostdetail', $item->id) }}"
                                                method="POST">
                                                @csrf
                                            <td>
                                                <input type="number" name="from"
                                                    value="{{ $item->from }}" class="form-control"
                                                    required>
                                            </td>
                                            <td>
                                                <input type="number" name="to"
                                                    value="{{ $item->to }}" class="form-control"
                                                    required>
                                            </td>
                                            <td>
                                                <input type="number" name="cost"
                                                    value="{{ $item->cost }}" class="form-control"
                                                    required>
                                            </td>
                                           
                                            <td class="d-flex">
                                                {{-- update --}}
                                                <input type="submit" value="Update" class="btn btn-sm btn-info">
                                             </form>
                                                {{-- delete --}}
                                                <a href="{{ route('admin.package.deletecostdetail', $item->id) }}"
                                                    id="confirm_delete" class="btn btn-danger confirm_delete"
                                                    style="margin-left: 2px" >
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Cost</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')
<script>
    $('.confirm_delete').on('click', function (event) {
 event.preventDefault();
 const url = $(this).attr('href');
 swal({
     title: 'Are you sure?',
     text: 'This record and it`s details will be permanantly deleted!',
     icon: 'warning',
     buttons: ["Cancel", "Yes!"],
 }).then(function(value) {
     if (value) {
         window.location.href = url;
     }
 });
});
 </script>
 <script type="text/javascript">
     $(document).ready(function() {
         var maxField = 99; //Input fields increment limitation
         var addButton = $('.add_button'); //Add button selector
         var wrapper = $('.field_wrapper'); //Input field wrapper
         var fieldHTML ='<div class="field_wrapper remove"><div class="row"> <div class="col-md-2"> <label class="form-label" for="from">From</label> <input type="number" name="from[]" placeholder="Eg:1" class="form-control p-2" value="{{old('from[]')}}" required/> </div><div class="col-md-2"> <label class="form-label" for="to">To</label> <input type="number" name="to[]" placeholder="Eg:20" class="form-control p-2" value="{{old('to[]')}}" required/> </div><div class="col-md-2"> <label class="form-label" for="cost">Cost</label> <input type="number" name="cost[]" placeholder="Eg:20000" class="form-control p-2" value="{{old('cost[]')}}" required/> </div><div class="col-md-1"> <a href="javascript:void(0);" class="remove_button" title="Remove field"> <img src="{{asset('uploads/default/red-x.png')}}"/></a> </div></div></div>';
         var x = 1; //Initial field counter is 1

         //Once add button is clicked
         $(addButton).click(function() {
             //Check maximum number of input fields
             if (x < maxField) {
                 x++; //Increment field counter
                 $(wrapper).append(fieldHTML); //Add field html
             }
         });

         //Once remove button is clicked
         $(wrapper).on('click', '.remove_button', function(e) {
             e.preventDefault();
             $(this).parents('.remove').remove(); //Remove field html
             x--; //Decrement field counter
         });
     });
 </script>
@endsection
