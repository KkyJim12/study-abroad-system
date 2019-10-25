<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Course;
use App\MemberCourse;
use App\Reference;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = new Member;
        $member->firstname = $request->get('firstname');
        $member->lastname = $request->get('lastname');
        $member->nickname = $request->get('nickname');
        $member->birthday = $request->get('birthday');
        $member->passport = $request->get('passport');
        $member->tel = $request->get('tel');
        $member->email = $request->get('email');
        $member->GPA = $request->get('GPA');
        $member->IELTS = $request->get('IELTS');
        $member->save();

        if($request->get('course')) {
            foreach($request->get('course') as $test) {
                $course = new MemberCourse;
                $course->member_id = $member->id;
                $course->course_id = $test['id'];
                $course->save();
            }
        }

        $ref = new Reference;
        $ref->member_id = $member->id;
        $ref->save();

        return response()->json($member);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
