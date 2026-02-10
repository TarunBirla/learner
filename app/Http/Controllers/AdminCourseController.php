<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    // Show Static Course List
    public function index(){

        // Dummy Data (Temporary)
        $courses = [
            [
                'id' => '1',
                'title' => 'Web Development',
                'price' => '₹2999',
                'image' => 'demo1.jpg'
            ],
            [
                'id' =>' 2',
                'title' => 'Data Science',
                'price' => '₹3999',
                'image' => 'demo2.jpg'
            ],
            [
                'id' => '3',
                'title' => 'UI UX Design',
                'price' => '₹2499',
                'image' => 'demo3.jpg'
            ]
        ];

        return view('admin.courses.index', compact('courses'));
    }


    // Show Add Form (UI Only)
    public function create(){

        return view('admin.courses.create');
    }
}
