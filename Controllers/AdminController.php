<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;

class AdminController extends Controller
{
  
public function admincat(){
        $cat = Category::all();
        return view('adm.adminquizz', ['categories' => $cat]);
    }
    public function adminblog(){
        $cat = Category::all();

        return view('adm.adminblog', ['categories' => $cat]);
    }
   
    public function editCategoryAction(Request $request ,$id){

        if ($_POST['action'] == 'Edit') {
        $categoryname = $request->input('categoryname');
        $categorydesc = $request->input('categorydesc');
        DB::update('update categories set categoryname = ?, categorydesc = ? where id = ?',[$categoryname,$categorydesc,$id]);
        return redirect('../admin-cat');
        }
        
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-cat');
        } 
    }
    public function editblogyAction(Request $request ,$id){

        if ($_POST['action'] == 'Edit') {
        $blogname = $request->input('blogname');
        $blogcontent = $request->input('blogdesc');
        DB::update('update blog set blogname = ?, blogcontent = ? where id = ?',[$blogname,$blogcontent,$id]);
        return redirect('../admin-blog');
        }
        
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-blog');
        } 
    }

    public function deleteCategory($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect('../admin-cat');
     }
  public function deleteblog($id) {
        DB::delete('delete from blog where id = ?',[$id]);
        return redirect('../admin-blog');
     }

     public function createCategory(){
        return view('adm.categories.create');
    } 
    public function createblog(){
    	$cats = DB::select('select * from categories');

        return view('adm.blog.create',['cats'=>$cats]);
    }

    public function storeCategory(){
        if ($_POST['action'] == 'Create') {
            $category = new Category();
            $category->categoryname = request('categoryname');
            $category->categorydesc = request('categorydesc');
            $category->image = request('image');
            $category->save();
            return redirect('../admin-cat');
        }
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-cat');
        }
    }
    public function storeblog(){
        if ($_POST['action'] == 'Create') {
            $blog = new blog();
            $blog->blogname = request('blogname');
            $blog->blogcontent = request('blogcontent');
            $category->save();
            return redirect('../admin-blog');
        }
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-blog');
        }
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

}
