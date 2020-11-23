<aside>
    <div class="card">
        <div class="card-header">
            <h2>{{isset($selected_category) ? $selected_category->name : 'Sve kategorije'}}</h2>
        </div>
            <div class="card-body">
                <ul class="sidebar-list">
                    @if(isset($all_subcategories))
                        @foreach ($all_subcategories as $subcategory)   
                            <a href="/prodavnica/{{$selected_category->slug}}/{{$subcategory->slug}}"><li class="sidebar-item 
                            @if($selected_subcategory)
                                {{ isActive($selected_subcategory->id, $subcategory->id) }}
                            @endif         
                            ">{{$subcategory->name}}</li></a>
                        @endforeach
                    @endif

                </ul>

            </div>
    </div>
    
</aside>
