<x-header />



    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                        <div class="card-header">{{ __('My Order History') }}</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Total Bill
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        status
                                    </th>
                                    <th>
                                        Order Date
                                    </th>
                                    <th>
                                        View Product
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                    @foreach ($orders as $item)
                                       @php
                                           $i++;
                                       @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->bill}}</td>
                                            <td>{{$item->fullname}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$i}}">
                                                    Open Product
                                                  </button>

                                                  <!-- The Modal -->
                                                  <div class="modal" id="myModal{{$i}}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">All Products</h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                          <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Quantity</th>
                                                                    <th>price</th>
                                                                    <th>Subt Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($items as $product)
                                                                @if ($item->id ==$product->orderId)
                                                                    <tr>
                                                                        <td>
                                                                           <img src="{{URL::asset('uploads/products/'.$product->picture)}}" alt="" width="100px">
                                                                           <p>{{$product->title}}</p>
                                                                        </td>
                                                                        <td>{{$product->quantity}}</td>
                                                                        <td>{{$product->price}}</td>
                                                                        <td>{{$product->price * $product->quantity}}</td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                          </table>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                      </div>
                                                    </div>
                                                  </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>

    </section>
    <!-- Contact Section End -->

  <x-footer />
