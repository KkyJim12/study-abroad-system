<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reference;

class ReferenceController extends Controller
{
    public function Store(Request $request) {
        if($request->get('type') == 'passport') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->passport = $request->get('image');
            $ref->save();
        }

        if($request->get('type') == 'transcript') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->transcript = $request->get('image');
            $ref->save();
        }

        if($request->get('type') == 'CU') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->CU = $request->get('image');
            $ref->save();
        }

        if($request->get('type') == 'SOP') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->SOP = $request->get('image');
            $ref->save();
        }

        if($request->get('type') == 'rec1') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->rec_1 = $request->get('image');
            $ref->save();
        }

        if($request->get('type') == 'rec2') {
            $ref = Reference::where('member_id',$request->get('id'))->first();
            $ref->rec_2 = $request->get('image');
            $ref->save();
        }
    }
}
