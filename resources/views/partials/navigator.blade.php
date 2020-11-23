<div class="navigator">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ml-2">
                    @isset($selected_category)
                        {{ $selected_category ? $selected_category->name : '' }} 
                    @endisset
                    @isset($selected_subcategory)
                        {{ $selected_subcategory ? '/ '.$selected_subcategory->name : '' }}
                    @endisset

                    {{ isset($search) ? 'Rezultati pretrage: '.$search : '' }}
                </div>
            </div>
        </div>
    </div>
</div>