@extends('admin/layout/app')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
       <div class="row">
          <div class="col-7 align-self-center">
             <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"> Brand Management</h3>
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
             <div class="col-md-4">
                <div class="card border-right">
                   <div class="card-body">
                      <div class="d-flex d-lg-flex d-md-block align-items-center">
                         <form action="{{route('storebrand')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                               <div class="col-md-12">
                                  <input type="text" name="name" class="form-control" placeholder="Brand Name">
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

             <div class="col-md-8">
             
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                      @if(Session::has($key))
                          <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                      @endif
                  @endforeach 
                
               <table class="table">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Created-at</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($brand as $i => $item)
                    <tr>
                     <td>{{$i+1}}</td>
                     <td>{{$item->name}}</td>
                     <td><img src="{{asset('/uploads/brands/'.$item->icon)}}" alt="" style="width:32px;"></td>
                     <td>{{$item->created_at}}</td>
                     <td>
                        <a href="{{route('editbrand',$item->id)}}"><img src="{{asset('backend/assets/images/edit.svg')}}" alt=""></a> 
                        <a href="{{route('deletebrand',$item->id)}}"><img src="{{asset('backend/assets/images/hg.svg')}}" alt=""> </a>
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