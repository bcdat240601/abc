                        @foreach ($showitem as $item)
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="product-details.html">
											<img class="default-img" src="{{ asset('images/product/'.$item->image) }}" alt="#">
											<img class="hover-img" src="{{ asset('images/product/'.$item->image) }}" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<button title="Add to cart" class="btn" data-id="{{$item->id}}">Add to Cart</button>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="product-details.html">{{$item->name}}</a></h3>
										<div class="product-price">
											<span>{{number_format($item->price)}} VNĐ</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach