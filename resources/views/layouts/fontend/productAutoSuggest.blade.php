<style>
    .list-item a {
        text-decoration:none;
    }
    .suggestListUl {
        padding: 20px;
    }
    .list-item a li {
        border-bottom: 1px solid #ddd;
        padding: 17px 24px;
    }

</style>
<div class="suggestListUl">
    <ul>
        @forelse($products as $product)
            <div class="list-item">

                @if(session()->get('language') == 'bangle')
                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">
                        <li>
                            <img width="50px" height="50px" src="{{ asset($product->product_thumbnail) }}" alt="">
                            <strong>{{ $product->product_name_bn}}</strong>
                        </li>
                    </a>
                @else
                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}">
                        <li>
                            <img width="50px" height="50px" src="{{ asset($product->product_thumbnail) }}" alt="">
                            <strong>{{ $product->product_name_en }}</strong>
                        </li>
                    </a>
                @endif
            </div>
        @empty
            <li style="color:red; font-weight:700; padding:8px; display:block">Not Found</li>
        @endforelse
    </ul>
</div>

