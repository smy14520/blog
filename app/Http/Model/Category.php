<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='cate_id';
    protected $guarded=[];

     public static function tree($cate,$id,$lev)
     {
            static $tree;
          foreach($cate as $v)
          {
              if($v['paraent']==$id)
              {
                  $v['lev']=$lev;
                  $tree[]= $v;
                  Category::tree($cate,$v['cate_id'],$lev+1);
              }
          }
       return $tree;
     }

    public static function subtree($cate,$id=0,$lev=0)
    {
       $tree=array();
        foreach($cate as $v)
        {

            if($v['paraent']==$id)
            {
                $tree[$v['cate_id']]= $v;
                $tree[$v['cate_id']]['son']=Category::subtree($cate,$v['cate_id'],$lev+1);

            }

        }
        return $tree;
    }



}
