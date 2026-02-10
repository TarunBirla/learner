<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller {

 public function home(){
   return view('home');
 }

 public function courses(){
   return view('courses');
 }

 public function blog(){
   return view('blog');
 }
 public function contact(){
   return view('contact');
 }
 public function about(){
   return view('about');
 }
 public function instructors(){
   return view('instructors');
 }
 public function pricing(){
   return view('pricing');
 }
 public function enroll(){
   return view('enroll');
 }

 

}

