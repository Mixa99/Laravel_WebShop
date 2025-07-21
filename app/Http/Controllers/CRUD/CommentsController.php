<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function apiIndex() {
        $comments = Comment::paginate(10);
        return response()->json($comments);
    }

    public function apiShow($id){
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name')
            ->where('comments.product_id', '=', $id)->get();

        if($comments){
            return response()->json([
                'message' => $comments,
            ]);
        } else {
            return response()->json('Comments not found');
        }
    }

    public function apiStore (Request $request, $productId){
        $comment = new Comment();
        //$comment->user_id = Auth::user()->id; -> ne dodavati bez logina
        $comment->user_id = 1;
        $comment->product_id = $productId;
        $comment->rating = $request->rating;
        $comment->body = $request->body;
        $comment->save();
        
        //return redirect()->back()->with('success', 'Product is successfuly rated');
        return response()->json('Comment added successfuly');
    }

    public function apiDestroy($id){
        $comment = Comment::find($id);
        if($comment->userId === Auth::user()->id){
            $comment->delete();
            return response()->json('Comment deleted successfuly');
        } else {
            return response()->json('Comment not found');
        }
    }

    public function index() {
        $comments = Comment::paginate(10);
        return response()->json($comments);
    }

    public function show($id){
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name')
            ->where('comments.product_id', '=', $id)->get();

        if($comments){
            return view('layouts.comments', ['comments' => $comments]);
        } else {
            return redirect()->back()->with('error', 'Comments not found');
        }
    }

    public function store (Request $request, $productId){
        $commentExist = Comment::where('user_id', Auth::user()->id)
                                ->where('product_id', $productId)
                                ->orderBy('created_at', 'desc')->first();
        if($commentExist){
            return redirect()->back()->with('error', 'You reviewed this product already');
        }
        $comment = new Comment();
        if(!Auth::user()){
            return redirect()->back()->with('error', 'You must be logged in');
        }
        if(!$request->filled('body')){
            return redirect()->back()->with('error', 'You must write a review');
        }
        $comment->user_id = Auth::user()->id; // ne dodavati bez logina
        $comment->product_id = $productId;
        $comment->rating = $request->rating;
        $comment->body = $request->body;
        $comment->save();
        
        return redirect()->back()->with('success', 'Comment is successfuly rated');
    }

    public function destroy($id){
        $comment = Comment::find($id);
        if($comment->userId === Auth::user()->id){
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        } else {
            return back()->withErrors('Comments not found');
        }
    }
}
