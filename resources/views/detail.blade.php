@extends('layout')
@section('infomation')
<style>
    #show
    {
        width: 100%;
        height: 1000px;
    }
</style>
<!--Section: Block Content-->
<div class="mb-5">

    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
  
        <div id="mdb-lightbox-ui"></div>
  
        <div class="mdb-lightbox">
  
          <div class="row product-gallery mx-1">
  
            <div class="col-12 mb-0" style="margin-top: 5%">
              <figure class="view overlay rounded z-depth-1 main-img">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                  data-size="710x823">
                  <img src="{{ asset('images/product/'.$pd->image) }}"
                    class="img-fluid z-depth-1">
                </a>
              </figure>
              <figure class="view overlay rounded z-depth-1" style="display:none;">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                  data-size="710x823">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                    class="img-fluid z-depth-1">
                </a>
              </figure>
              <figure class="view overlay rounded z-depth-1" style="display:none;">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                  data-size="710x823">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                    class="img-fluid z-depth-1">
                </a>
              </figure>
              <figure class="view overlay rounded z-depth-1" style="display:none;">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                  data-size="710x823">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                    class="img-fluid z-depth-1">
                </a>
              </figure>
            </div>
            <div class="col-12">
              
            </div>
          </div>
  
        </div>
  
      </div>
      <div class="col-md-6" style="margin-top:3%">
  
        <h5>{{$pd->name}}</h5>
        <p class="mb-2 text-muted text-uppercase small">{{$pd->name}}</p>
        {{-- <ul class="rating">
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul> --}}
        <p><span class="mr-1"><strong>${{$pd->price}}</strong></span></p>
        <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
          error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
          officia quis dolore quos sapiente tempore alias.</p>
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                <td>{{$pd->battery}}</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                <td>{{$pd->color}}</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                <td>USA, Europe</td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="table-responsive mb-2">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                {{-- <td class="pl-0 pb-0 w-25">Quantity</td>
                <td class="pb-0">Select RAM</td> --}}
              </tr>
              <tr>
                <td class="pl-0">
                  {{-- <div class="def-number-input number-input safari_only mb-0">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                      class="minus"></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                      class="plus"></button>
                  </div> --}}
                </td>
                <td>
                  {{-- <div class="mt-1">
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="small" name="materialExampleRadios"
                        checked>
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="small">320GB</label>
                    </div>
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="medium">64GB</label>
                    </div>
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="large">120GB</label>
                    </div> --}}
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        {{-- <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button> --}}
        <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
            class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
      </div>
    </div>
    <script>
        $(document).ready(function () {
  // MDB Lightbox Init
  $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  });
});
    </script>
  </div>
  <!--Section: Block Content-->
{{-- <div id="show">
    <ul>
        <li>TÊN SÃN PHẨM:{{$pd->name}}</li>
        <li>DUNG LƯỢNG PIN(mAH):{{$pd->battery}}</li>
        <li>GIÁ SẢN PHẨM:{{$pd->price}} VNĐ</li>
    </ul>
</div> --}}
@endsection
