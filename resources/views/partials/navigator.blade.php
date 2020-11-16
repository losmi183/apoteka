<div class="navigator">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ml-4">
                    {{ isset($category) ? $category->name : '' }} 
                    {{ isset($subcategory) ? $subcategory->name : '' }}

                    {{ isset($search) ? 'Rezultati pretrage: '.$search : '' }}
                </div>
            </div>
        </div>
    </div>
</div>