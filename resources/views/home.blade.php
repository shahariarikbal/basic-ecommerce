@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="card-header">Category</div>
                           <div class="card-body">
                            <form action="{{ url('category/store') }}" method="post">
                                @csrf
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Category name">
                                <button type="submit" class="btn btn-sm btn-success mt-1">Submit</button>
                            </form>
                            <h4>Category List</h4>
                            <table class="table table-striped mt-2">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $cat)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-info">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="card-header">Add Product</div>
                           <div class="card-body">
                            <form action="{{ url('product/store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Product price" maxlength="8">
                                </div>
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="cat_id" class="form-control">
                                        <option selected disabled>Select A Category</option>
                                        @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option selected disabled>Select A Brand</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"/>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success mt-1">Submit</button>
                            </form>
                               <br/>
                            <h4>Product List</h4>
                            <table class="table table-striped mt-2">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->category ? $data->category->name : '' }}</td>
                                        <td>{{ $data->brand ? $data->brand->name : '' }}</td>
                                        <td width="20%">
                                            <a href="" class="btn btn-sm btn-info">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                           </div>
                       </div>
                       <div class="col-md-4">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                         <form action="{{ url('brand/store') }}" method="post">
                             @csrf
                             <div class="form-group">
                             <label>Name</label>
                             <input type="text" name="name" class="form-control" placeholder="Product name">
                             </div>
                             <div class="form-group">
                                 <label>Select Category</label>
                                 <select name="cat_id" class="form-control">
                                     <option selected disabled>Select A Category</option>
                                     @foreach ($category as $data)
                                     <option value="{{ $data->id }}">{{ $data->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <button type="submit" class="btn btn-sm btn-success mt-1">Submit</button>
                         </form>
                         <h4>Brand List</h4>
                         <table class="table table-striped mt-2">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Category</th>
                                 <th scope="col">Action</th>
                               </tr>
                             </thead>
                             <tbody>
                                 @foreach ($brands as $key => $brand)
                                 <tr>
                                     <th scope="row">{{ $key+1 }}</th>
                                     <td>{{ $brand->name }}</td>
                                     <td>{{ $brand->category ? $brand->category->name : '' }}</td>
                                     <td width="20%">
                                         <a href="" class="btn btn-sm btn-info">Edit</a>
                                         <a href="" class="btn btn-sm btn-danger">Delete</a>
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
        </div>
    </div>
</div>
@endsection
