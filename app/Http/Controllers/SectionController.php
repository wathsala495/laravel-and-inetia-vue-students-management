<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ListSectionsRequest;
use App\Http\Resources\SectionResource;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __invoke(ListSectionsRequest $request)
    {
         $section = Sections::where('class_id',$request->class_id)->get();

         return SectionResource::collection($section);
    }
}
