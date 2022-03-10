@extends('welcome')
@section('content')
<div class="container mt-4">
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Product Details</label>
            <input type="text" name="product_details" id="product_details" class="form-control" required>
        </div>
        <br>
        <button type="sumbit" onclick="productAdded()">Submit</button>

        <br><br>
  


    <table id="tableDetails" class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Details</th>
            </tr>   
        </thead> 
        <tbody>
            @if (count($products)>0)
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name}}</td>
                <td>{{ $product->product_details}}</td>
                <td>
                    <button class="btn btn-sm btn-success" onclick="editProduct({{$product->id}})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteProduct({{$product->id}})">Delete</button>
                </td>
            </tr>
            @endforeach 
            @else
                <tr>
                    <td colspan="2" class="text-center">No Products Found</td>
                </tr>
            @endif
              
        </tbody>        
        </table>

        <div class="modal" tabindex="-1" role="dialog" id="edit_product_modal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Details</h5>
                  
                   
                  </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_product_id" value="">
                    <div class="form-group">
                        <label for="">Edit Product Name</label>
                        <input type="text" name="edit_product_name" id="edit_product_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Edit Product details</label>
                        <input type="text" name="edit_product_details" id="edit_product_details" class="form-control" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="updateDetails()">Save changes</button>
                  <button type="button" class="btn btn-sm btn-danger" onclick="closeModal()">Close</button>
                  
                </div>
              </div>
            </div>
          </div>
          
          {{-- @php
              foreach($products as $product) {

              }
          @endphp --}}
</div>
@endsection


@push('css')
    <link rel="stylesheet" href="style.css">
@endpush


@push('scripts')
<script src="{{ asset('js/main.js') }}"></script>
@endpush