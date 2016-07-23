<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        @foreach ($categories as $category)
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href='{{url("products/categories/$category->id")}}'>
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{$category->category_name}}</a>
                </h4>
            </div>
            @if(isset($category->brands))
                <div id="sportswear" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($category->brands as $brand)
                            <li><a href='{{url("products/brands/$brand->brand_id")}}'>$brand->brand_name </a></li>
                            @endforeach                        
                        </ul>
                    </div>
                </div>            
            @endif
        @endforeach
    </div>
</div><!--/category-products-->

<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
@foreach ($brands as $brand)
    <li><a href='{{url("products/brands/$brand->id")}}'> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
@endforeach
        </ul>
    </div>
</div><!--/brands_products-->

<div class="shipping text-center"><!--shipping-->
    <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
</div><!--/shipping-->