<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory;
    use SearchableTrait;
    use Sluggable;


    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array   
         */
        'columns' => [
            'products.ime' => 10,
            'products.slug' => 10,
            'products.proizvodjac' => 10,
            'products.opis' => 5,
        ]
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'ime'
            ]
        ];
    }


    protected $guarded = [];

    /**
     * Relationships
     * 
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Category::class);
    }


    // Mutator
    public function getDostupnostAttribute($value)
    {
        return $value ? 'Na stanju' : 'Nije dostupno';
    }

    /**
     * Scopes
     */

     /**
     * Scope a query to order by price.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectByCategoryId($query, $category_id)
    {
        return $query->when($category_id, function($query, $category_id) {
            return $query->where('category_id', $category_id);
        });
    }
    public function scopeSelectBySubcategoryId($query, $subcategory_id)
    {
        return $query->when($subcategory_id, function($query, $subcategory_id) {
            return $query->where('subcategory_id', $subcategory_id);
        });
    }
    public function scopeSelectBySubcategory($query, $subcategory)
    {
        return $query->when($subcategory, function($query, $subcategory) {
            return $query->where('subcategory_id', $subcategory->id);
        });
    }

    public function scopeSortPrice($query, $cena)
    {
        return $query->when($cena, function($query, $cena) {
            return $query->orderBy('cena', ($cena == 'rastuce' ? 'asc' : 'desc'));
        });
    }
    public function scopeSortName($query, $ime)
    {
        return $query->when($ime, function($query, $ime) {
            return $query->orderBy('ime', ($ime == 'rastuce' ? 'asc' : 'desc'));
        });
    }



}
