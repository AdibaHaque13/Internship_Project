<x-adminheader title="Products"/>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#addNewProduct">
                            Add New Product
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="addNewProduct">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ URL::to('AddNewProduct') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="">Title</label>
                                            <input type="text" name="title" placeholder="Enter Title"
                                                class="form-control mb-2" id="">
                                            <label for="">Price</label>
                                            <input type="text" name="price" placeholder="Enter Price"
                                                class="form-control mb-2" id="">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" placeholder="Enter Quantity"
                                                class="form-control mb-2" id="">
                                            <label for="">Picture</label>
                                            <input type="file" name="file" class="form-control mb-2"
                                                id="file">
                                            <label for="">Description</label>
                                            <input type="text" name="description" placeholder="Enter Description"
                                                class="form-control mb-2" id="">
                                            <label for="">Categories</label>
                                            <select name="category" class="form-control mb-2" id="">
                                                <option value="">Select Category</option>
                                                <option value="Accessories">Accessories</option>
                                                <option value="Shoes">Shoes</option>
                                                <option value="Clothes">Clothes</option>
                                            </select>
                                            <label for="">Type</label>
                                            <select name="type" class="form-control mb-2" id="">
                                                <option value="">Select Type</option>
                                                <option value="Best Sellers">Best Sellers</option>
                                                <option value="new-arrivals">New Arrivals</option>
                                                <option value="sale">Sales</option>
                                            </select>
                                            <input type="submit" name="save" class="btn btn-success" value="save">
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <p class="card-title mb-0">Top Products</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Picture</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($products as $item)
                                    @php
                                        $i++;
                                    @endphp
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ URL::asset('uploads/products/' . $item->picture) }}"
                                                    width="100px" alt=""></td>
                                            <td class="font-weight-bold">{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">{{ $item->category }}</div>
                                            </td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-info">{{ $item->type }}</div>
                                            </td>
                                            <td class="font-weight-medium">
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                    data-target="#updateModel{{$i}}">
                                                    Update
                                                </button>
                                                <!-- The Modal -->
                                                <div class="modal" id="updateModel{{$i}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Product</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <form action="{{ URL::to('updateProduct') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for="">Title</label>
                                                                    <input type="text" name="title" value="{{$item->title}}"
                                                                        placeholder="Enter Title"
                                                                        class="form-control mb-2" id="">
                                                                    <label for="">Price</label>
                                                                    <input type="text" name="price" value="{{$item->price}}"
                                                                        placeholder="Enter Price"
                                                                        class="form-control mb-2" id="">
                                                                    <label for="">Quantity</label>
                                                                    <input type="number" name="quantity" value="{{$item->quantity}}"
                                                                        placeholder="Enter Quantity"
                                                                        class="form-control mb-2" id="">
                                                                    <label for="">Picture</label>
                                                                    <input type="file" name="file"
                                                                        class="form-control mb-2" id="file">
                                                                    <label for="">Description</label>
                                                                    <input type="text" name="description" value="{{$item->description}}"
                                                                        placeholder="Enter Description"
                                                                        class="form-control mb-2" id="">
                                                                    <label for="">Categories</label>
                                                                    <select name="category" class="form-control mb-2"
                                                                        id="">
                                                                        <option value="{{$item->category}}">{{$item->category}}</option>
                                                                        <option value="Accessories">Accessories
                                                                        </option>
                                                                        <option value="Shoes">Shoes</option>
                                                                        <option value="Clothes">Clothes</option>
                                                                    </select>
                                                                    <label for="">Type</label>
                                                                    <select name="type" class="form-control mb-2"
                                                                        id="">
                                                                        <option value="{{$item->type}}">{{$item->type}}</option>
                                                                        <option value="Best Sellers">Best Sellers
                                                                        </option>
                                                                        <option value="new-arrivals">New Arrivals
                                                                        </option>
                                                                        <option value="sale">Sales</option>
                                                                    </select>
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    <input type="submit" name="save"
                                                                        class="btn btn-success" value="Save Cahnges">
                                                                </form>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{URL::to('deleteProduct/'.$item->id)}}" class="btn btn-danger">Delete</a>
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <x-adminfooter />
