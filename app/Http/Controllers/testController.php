<?php

namespace App\Http\Controllers;
use App\post;
use App\category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Input;
class testController extends Controller
{
    //
     public function index(){
     	//$s="66";

    	//return view('acceuilAdmin.index')->with('num',$s);
     	$posts=post::Publier()->with('category')->get();
        //$post->load('category');//ça récupere aussi de façon optimal
     	return view('acceuilAdmin.index',compact('posts'));
    }

 
    public function create(){
    $post = new post();
    $categories=category::lists('name','id');
    return view('acceuilAdmin.create',compact('post','categories'));
    
    }
    public function edit($id){

    	$post=post::findOrFail($id);
        $categories=category::lists('name','id');

    	return view('acceuilAdmin.edit',compact('post','categories'));
    }
    public function update($id,Request $request){
    	$post=post::findOrFail($id);
    	$post->update($request->all());
		return redirect(route('test.edit',$id));		
    }
    public function show($id){
        $post=post::Publier()->where('id',$id)->firstOrFail();
        return $post;
    }

    public function destroy($id){

    }
    public function store(Request $request){
        
        $post=post::Create($request->all());
        return redirect(route('test.index'));
    }
}
