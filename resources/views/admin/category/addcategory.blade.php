@extends('admin/layout/app')
@section('content')
<div class="page-wrapper">
   <div class="page-breadcrumb">
      <div class="row">
         <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"> Category Management</h3>
            <div class="d-flex align-items-center">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb m-0 p-0">
                     <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                     </li>
                  </ol>
               </nav>
            </div>
         </div>
         <div class="col-5 align-self-center">
            <div class="customize-input float-right">
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="card-group">
         <div class="row">
            <div class="col-md-8">
               <div class="card border-right">
                  <div class="card-body">
                     <div class="d-flex d-lg-flex d-md-block align-items-center">
                        {{-- datatables  --}}
                        <div class="table-responsive">
                           <table id="default_order" class="table table-striped table-bordered display no-wrap"
                              style="width:100%">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @forelse ($category as $i => $item)
                                 <tr>
                                     <td>{{$i+1}} </td>
                                     <td><img src="{{asset('uploads/category/'.$item->icon)}}" alt="" style="width:32px;"></td>
                                    <td>{{$item->name}} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary setData" 
                                        data-toggle="modal" 
                                            data-target="#myModal" 
                                            data-id = "{{$item->id}}"
                                            data-name = "{{$item->name}}"
                                            data-icon = "{{asset('uploads/category/'.$item->icon)}}"
                                            >Edit</button>

                                            <form action="{{route('deletecategory',$item->id)}}" method="post">
                                             {{ csrf_field() }}
                                              {{-- @method('Delete') --}}
                                             <button type="submit" class="btn btn-danger setData"><i class="fa fa-trash" aria-hidden="true"></i></button>         
                                           </form>
                                    </td>
                                 </tr>
                                 @empty
                                 @endforelse
                              </tbody>
                           </table>
                        </div>
                        {{-- datatables  --}}
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card border-right">
                  <div class="card-body">
                     <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <form action="{{route('storecategory')}}" method="post" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="text" name="name" class="form-control" placeholder="Category Name">
                              </div>
                              <div class="col-md-12 mt-3">
                                <input type="file" name="icon" class="form-control" placeholder="Icon Name">
                             </div>
                              <div class="col-md-12 mt-3"> 
                                 <button type="submit" class="form-control btn btn-primary">Store</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



  <!-- sample modal content -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Update Category</h4>
              <button type="button" class="close" data-dismiss="modal"
                  aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

            <form action="{{route('updatecategory')}}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
              {{-- <h6>Update Category</h6> --}}
              
                <div class="row">
                    <input type="hidden" name="category_id" id="category_id">
                   <div class="col-md-12">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
                   </div>
                   <div class="col-md-8 mt-3">
                     <input type="file" name="icon" class="form-control" placeholder="Icon Name">
                  </div>
                  <img src="" id="icon" alt="">
                   <div class="col-md-4 mt-3"> 
                      <img src="" id="edit_img" alt="" style="width:32px;">
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" class="setData">Save changes</button>
                </div>
             </form>
          </div>


      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection