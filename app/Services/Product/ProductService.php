<?php

namespace App\Services\Product;

use App\Models\Tag;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTag;

use App\Components\Recusive;
use App\Models\ProductImage;
use GuzzleHttp\Psr7\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService{
    use StorageImageTrait;
     private $category;
    private $tag;
    private $producttag;
    private $product;

    
    public function __construct(Category $category,Tag $tag,ProductTag $producttag, Product $product)
    {
        $this->producttag = $producttag;
        $this->tag = $tag;
        $this->product = $product;
        $this->category = $category;

    }
    public function getMenu(){
        return Menu::where('active', 1)->get(); 
    }
    
    public function getProduct($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOptions = $recusive->categoryrecusive($parentId);
        
        return $htmlOptions;
    }

    public function isValidPrice($request){
        if($request->input('price') != 0  && $request->input('promotional-price') != 0  
        && $request->input('promotional-price') >= $request->input('price')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if((int)$request->input('price') == 0 && $request->input('promotional-price') != 0 ){
            Session::flash('error', 'Vui lòng nhâp giá gốc');
            return false;
        }
    }
    public function store($request){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false) return false;

        try{
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' =>auth()->id(),
                'category_id' => $request->category_id,
                'status' => $request->status,
            ];
            $data = $this->storageImageUpload($request,'feature_image_path','product');
            if(!empty($data)){
                $dataProductCreate['feature_image_name'] = $data['file_name'];
                $dataProductCreate['feature_image_path'] = $data['file_path'];
            }
            return $dataProductCreate;
        } catch (\Exception $e){
            Session::flash('Failed: '.$e->getMessage());
        }

    }
    public function storeImageMultiple($request, $product){
        // Insert data to product_image
        foreach($request->file('image_path') as $fileItem){
            $dataProductImageDetail = $this->storageImageUploadMultiple($fileItem,'product');
            $product->images()->create([
                'image_path'=>$dataProductImageDetail['file_path'],
                'image_name'=>$dataProductImageDetail['file_name'],
            ]);
        }
    }
    public function storeTags($request){
        foreach($request->tags as $tagItem){
            $tagIntance = $this->tag->firstOrCreate([
                'name' => $tagItem,
            ]);
            $tagIds[] = $tagIntance->id;
        }
        return $tagIds;
        
    }
}