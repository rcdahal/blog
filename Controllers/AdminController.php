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
    public function index(Request $request){
    	if($request->session()->has('name')){
    		echo $request->session()->get('name');
    		exit();
    	}else{
    		echo "no data in the session";
    	}
       
    }
    public function editContent(Request $request ,$id){

        if ($_POST['action'] == 'Edit') {
        $content = $request->input('content');
        DB::update('update content set introtext = ? where id = ?',[$content,$id]);
        return redirect('/admin');
        } 
    }

    public function adminquizz(){
        $cat = Category::all();
        return view('adm.adminquizz', ['categories' => $cat]);
    }
    public function adminblog(){
        $cat = Category::all();

        return view('adm.adminblog', ['categories' => $cat]);
    }
    

    public function Category($id){
        $cats = DB::select('select * from categories where id = ?',[$id]);
        $quests = DB::select('select * from questions where questionqategory = ?',[$id]);
        return view('adm.questions.index',['cats'=>$cats, 'quests'=>$quests]);
    }

   

    public function editCategory($id){
        $cats = DB::select('select * from categories where id = ?',[$id]);
       return view('adm.categories.edit',['cats'=>$cats]);
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

    public function deleteCategory($id) {
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect('../admin-cat');
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
            $category = new Category();
            $category->blogname = request('blogname');
            $category->blogcontent = request('blogcontent');
            $category->save();
            return redirect('../admin-blog');
        }
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-blog');
        }
    }

    public function Question($id){
        $quests = DB::select('select * from questions where questionqategory = ?',[$id]);
        return view('adm.questions.details',['quests'=>$quests]);
    }


    public function createQuestion($id){
        $cats = DB::select('select * from categories where id = ?',[$id]);
        return view('adm.questions.create',['cats'=>$cats]);
    }

    public function storeQuestion($id){

        $cats = DB::select('select * from categories where id = ?',[$id]);
        $quests = DB::select('select * from questions where questionqategory = ?',[$id]);

        if ($_POST['action'] == 'Create') {
            $question = new Question();
            $question->questionqategory = $id;
            $question->question = request('question');
            $question->answera = request('answera');
            $question->answerb = request('answerb');
            $question->answerc = request('answerc');
            $question->answerd = request('answerd');
            $question->correct = request('correct');
            $question->save();
            return redirect('../admin-quizz/category/' . $id);
        }

        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-quizz/category/' . $id);
        }
    }


    public function editQuestion($id){
        $quests = DB::select('select * from questions where id = ?',[$id]);
        return view('adm.questions.edit',['quests'=>$quests]);
        
    }

    public function editQuestionAction(Request $request ,$cid, $qid){

        if ($_POST['action'] == 'Edit') {
        $question = $request->input('question');
        $answera = $request->input('answera');
        $answerb = $request->input('answerb');
        $answerc = $request->input('answerc');
        $answerd = $request->input('answerd');
        $correct = $request->input('correct');
        DB::update('update questions set question = ? , answera = ? , answerb = ? , answerc = ? , answerd = ? , correct = ? where id = ?',[$question,$answera,$answerb,$answerc,$answerd,$correct,$qid]);
        return redirect('../admin-quizz/category/' . $cid);
        }
        
        if ($_POST['action'] == 'Cancel') {
            return redirect('../admin-quizz/category/' . $cid);
        } 
    }

    public function deleteQuestion($cid, $qid) {
        DB::delete('delete from questions where id = ?',[$qid]);
        return redirect('../admin-quizz/category/' . $cid);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

}
