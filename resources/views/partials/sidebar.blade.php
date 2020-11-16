<aside>
    <div class="card">
        <div class="card-header">
            <h2>{{isset($category->name) ? $category->name : 'Sve kategorije'}}</h2>
        </div>
            <div class="card-body">
                <ul class="sidebar-list">
                    @if(isset($subcategories))
                        @foreach ($subcategories as $subcategory)   
                            <a href="/shop/{{$category->id}}/{{$subcategory->id}}"><li class="sidebar-item 
                            @isset($subcategory_id)
                                {{ isActive($subcategory_id, $subcategory->id) }}
                            @endisset         
                            ">{{$subcategory->name}}</li></a>
                        @endforeach
                    @endif

                </ul>

            </div>
    </div>
    
</aside>
