<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id'); // 1 product_id có thể có nhiều ảnh, tham số thứ có thể k có, nếu k có tham số 2 thì laravel sẽ tự động đưa tên class về chữ thường và thêm id phía sau vd: product_id
    }
        public function tags(){
            return $this
            ->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps();
        }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getProduct($filters =[]){
        $user = Auth::user();

        $products = Product::orderBy('created_at', 'asc');
        $products= $products->where('user_id', $user->id);
        if (!empty($filters)) {
            $products = $products->where($filters);
        }

        // $products = $products->get();
        $products = $products -> paginate(20);
        
        return $products;
        
        }
    }
    // public function productImage(){
    //     return $this->hasMany(ProductImage::class,'product_id'); // 1 product_id có thể có nhiều ảnh, tham số thứ có thể k có, nếu k có tham số 2 thì laravel sẽ tự động đưa tên class về chữ thường và thêm id phía sau vd: product_id
    // }
    