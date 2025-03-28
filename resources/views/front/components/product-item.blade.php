


<div class="product-item item{{$product->tag}}">
    <div class="pi-pic">
            <img src="'front/img/products/'{{$product->productImages[0]->path ?? ''}}"
                alt="">
       
        @if ($product->discount != null)
            <div class="sale"> Sale</div>
        @endif
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>

        <ul>
            <li class="w-icon active">
                <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                        <i class="icon_bag_alt"></i>
                    </button>
                </form>
            </li>
            <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Quick View</a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">Coat</div>
        <a href="">
            <h5>{{ $product->name }}</h5>
        </a>
        <div class="product-price">
            ${{ $product->price }}
            @if ($product->discount != null)
                <span>${{ $product->discount }}</span>
            @endif
        </div>
    </div>
</div>