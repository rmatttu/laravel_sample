<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

class TagApiController extends Controller
{

    public function getTags(Request $request)
    {
        $query_tag_name = $request->get('q');
        // model から name カラムをlike検索
        // limit 10

        $q = $request->q;
        return Tag::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}
