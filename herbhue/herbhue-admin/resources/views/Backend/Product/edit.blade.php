@extends('layouts.app')
@section('content')
@if(Session::has('success'))
<div class="alert customize-alert alert-dismissible text-success  alert-success fade show remove-close-icon" role="alert">
    <span class="side-line bg-success"></span>
    <div class="d-flex align-items-center font-weight-medium">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-success feather-sm me-2 flex-shrink-0">
            <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line>
        </svg>
        <span class="text-truncate"> {{Session::get('success')}}</span>
        <div class="ms-auto d-flex justify-content-end">
        <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-success feather-sm">
                <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
        </a>
        </div>
    </div>
</div>
@endif
@if(Session::has('errors'))
<div class="alert customize-alert alert-dismissible text-danger  alert-danger fade show remove-close-icon" role="alert">
    <span class="side-line bg-danger"></span>
    <div class="d-flex align-items-center font-weight-medium">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-danger feather-sm me-2 flex-shrink-0"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>
        <span class="text-truncate">{{Session::get('errors')}}</span>
        <div class="ms-auto d-flex justify-content-end">
        <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-danger feather-sm"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a>
        </div>
    </div>
</div>
@endif

  <!-- -------------------------------------------------------------- -->
  <!-- Start Page Content -->
  <!-- -------------------------------------------------------------- -->

  <!-- .row -->
  <div class="row">
    <div class="col-sm-12">
      <!-- ---------------------
                    start Default Basic Forms
                ---------------- -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Product</h4>
          <form enctype="multipart/form-data" action="{{route('product.update',$product->id)}}"  method="post">
          @csrf
          <input type="hidden" id="total_options" name="total_options" value="{{ count($productoptions) }}">
            <div class="mb-3 row">
              <label for="category_id" class="col-md-2 col-form-label">Category Name</label>
              <div class="col-md-10">
                <select id="category_id" name="category_id" class="form-select" onchange="showsubcategory(this.value);" required>
                     <option value="">Select Category</option> 
                     @foreach($category as $cat)
                     <option value="{{ $cat->id }}"  <?php if($cat->id==$product->category_id){ ?> selected<?php } ?>>{{ $cat->name }}</option>
                     @endforeach
                   </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="subcategory_id" class="col-md-2 col-form-label">Sub Category Name</label>
              <div class="col-md-10" id="showsubcategory">
                <select id="subcategory_id" name="subcategory_id" class="form-select">
                  <option value="">Select SubCategory</option> 
                  @foreach($subcategory as $subcat)
                     <option value="{{ $subcat->id }}"  <?php if($subcat->id==$product->subcategory_id){ ?> selected<?php } ?>>{{ $subcat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
             <div class="mb-3 row">
                <label class="col-md-2 col-form-label" for="name">Product Name</label>
              <div class="col-md-10">
                <input class="form-control" name="name" id="name" type="text" value="{{ $product->name }}" placeholder="Enter Product Name" required>
              </div>
            </div>
             <div class="mb-3 row">
                <label class="col-md-2 col-form-label" for="description">Product Description</label>
                <div class="col-md-10">
                <textarea class="form-control" cols="80" id="description" name="description"
                    rows="10" placeholder="Enter Product Description">{{ $product->description }}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-2 col-form-label" for="describe">Short description</label>
                <div class="col-md-10">
                  <input class="form-control" name="describe" id="describe" type="text" placeholder="Enter Short Description" value="{{ $product->describe }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-2 col-form-label" for="wellness">Trending Now</label>
                <div class="col-md-10">
                  <input type="radio" class="btn-check" name="wellness" id="wellness1" value="yes" autocomplete="off" @if($product->wellness=="yes") checked @endif>
                  <label class="btn btn-outline-primary rounded-pill font-weight-medium" for="wellness1">Yes</label>

                  <input type="radio" class="btn-check" name="wellness" id="wellness2" value="no" autocomplete="off" @if($product->wellness=="no") checked @endif>
                  <label class="btn btn-outline-warning rounded-pill font-weight-medium" for="wellness2">No</label>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-2 col-form-label" for="pricedetails">Price Details</label>
                <div class="col-md-10">
                  <div align="right">  
                    <button onclick="addOption();" class="btn rounded-pill px-4 btn-light-success text-success font-medium waves-effect waves-light" type="button"><i data-feather="plus-circle" class="feather-sm fill-white"></i> Add Option</button>
                  </div>
                  <table class="table table-condensed" id="myTable">
                    <tr>
                      <th class="col-sm-2"><div align="center">Quantity<span style="color:red">*</span></div></th>
                      <th class="col-sm-2"><div align="center">Quantity Type<span style="color:red">*</span></div></th>
                      <th><div align="center">Product Price (Selling Price)<span style="color:red">*</span></div></th>
                      <th><div align="center">Product Price (MRP Price)<span style="color:red">*</span></div></th>
                      <th><div align="center">Stock<span style="color:red">*</span></div></th>
                      <th><!-- <span style="color:red">*</span>--></th>
                    </tr> 
                    <?php for($i=0;$i<count($productoptions);$i++) { ?>
                    <tr id="<?php echo $i; ?>">
                      <td>
                        <input type="text" onkeypress="return onlyNumberKey(event)" name="opt_qty_<?php echo $i; ?>" value="<?php echo $productoptions[$i]->quantity; ?>" class="form-control" required>
                      </td>
                      <td>
                        <select name="opt_qtytype_<?php echo $i; ?>" class="form-select" required>
                          <option value="">Select</option>
                          <option value="Kg" <?php if($productoptions[$i]->quantitytype=="Kg"){ ?> selected <?php } ?>>Kg</option>
                          <option value="Gm" <?php if($productoptions[$i]->quantitytype=="Gm"){ ?> selected <?php } ?>>Gm</option>
                          <option value="Dz" <?php if($productoptions[$i]->quantitytype=="Dz"){ ?> selected <?php } ?>>Dz</option>
                          <option value="Pcs" <?php if($productoptions[$i]->quantitytype=="Pcs"){ ?> selected <?php } ?>>Pcs</option>
                          <option value="Ltr" <?php if($productoptions[$i]->quantitytype=="Ltr"){ ?> selected <?php } ?>>Ltr</option>
                          <option value="Ml" <?php if($productoptions[$i]->quantitytype=="Ml"){ ?> selected <?php } ?>>Ml</option>
                        </select>
                      </td>
                      <td>
                        <input type="text" onkeypress="return onlyNumberKey(event)" name="opt_price_<?php echo $i; ?>" class="form-control" value="<?php echo $productoptions[$i]->price; ?>" required>
                      </td>
                      <td>
                        <input type="text" onkeypress="return onlyNumberKey(event)" name="opt_mrp_price_<?php echo $i; ?>" class="form-control" value="<?php echo $productoptions[$i]->mrp_price; ?>" required>
                      </td>
                      <td>
                        <input type="text" onkeypress="return onlyNumberKey(event)" name="opt_stock_<?php echo $i; ?>" class="form-control" value="<?php echo $productoptions[$i]->stock; ?>" required>
                      </td>

                      <td>
                        <button title="Remove this option" class="btn btn-danger" id="removeOptionBtn" type="button" onClick="removeThisOption(<?php echo $i; ?>);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 feather-sm fill-white"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                      </td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image1">Product Image 1</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image1" name="image1">
                      </div>
                   </div>
                   @if($product->image1!="") <img src="{{ asset('images/'.$product->image1) }}" width="50" height="50"> @endif
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image2">Product Image 2</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image2" name="image2">
                      </div>
                    </div>
                    @if($product->image2!="") <img src="{{ asset('images/'.$product->image2) }}" width="50" height="50"> @endif
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image3">Product Image 3</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image3" name="image3">
                      </div>
                    </div>
                    @if($product->image3!="") <img src="{{ asset('images/'.$product->image3) }}" width="50" height="50"> @endif
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image4">Product Image 4</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>
                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image4" name="image4">
                      </div>
                    </div>
                    @if($product->image4!="") <img src="{{ asset('images/'.$product->image4) }}" width="50" height="50"> @endif
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image5">Product Image 5</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image5" name="image5">
                      </div>
                    </div>
                    @if($product->image5!="") <img src="{{ asset('images/'.$product->image5) }}" width="50" height="50"> @endif
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">&nbsp;</label>
              <div class="col-md-10">
                
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <div class="d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save feather-sm me-1 fill-icon"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                      Update
                    </div>
                  </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- ---------------------
                    end Default Basic Forms
                ---------------- -->
    </div>
  </div>
  <!-- /.row -->
  <!-- -------------------------------------------------------------- -->
  <!-- End PAge Content -->
  <!-- -------------------------------------------------------------- -->

@endsection
@section('script')
<!-- --------------------------------------------------------------- -->
<!-- This page JavaScript -->
<!-- --------------------------------------------------------------- -->
<script src="{{ asset('dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('dist/js/plugins/repeater-init.js') }}"></script>

<script>
   function onlyNumberKey(evt) {
             
             // Only ASCII character in that range allowed
             var ASCIICode = (evt.which) ? evt.which : evt.keyCode
             if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                 return false;
             return true;
         }
  function showsubcategory(category_id)
  {
    if(category_id=="")
    {
      alert("select the category first");
      return false;
    }
    else
    {
      var url="{{URL('showsubcategory')}}";
      $.ajax(
      {
          url: url,
          method: 'post', 
          data:{"category_id":category_id, "_token": "{{ csrf_token() }}" },
          success: function (response)
          {
              $("#showsubcategory").html(response);
          }
      });
    }
  }
</script>

@endsection