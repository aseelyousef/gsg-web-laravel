<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ShortRequest;
use App\Models\Shorturls;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function short(ShortRequest $request)
{
    if($request->original_url){
        // غيرت ShortUrl لـ shorturls
        $new_url = Shorturls::create([
'original_url'=>$request->original_url ]);
        if($new_url){
                
            $short_url =base_convert($new_url->id,10,30);
            $new_url->update([
                'short_url'=>$short_url ]);
            return back()->with('success_message','you short url:
            <a class="text-green-500" 
            href="'. url($short_url).'">'.url($short_url).'</a>');
        }
    }
    return  back();
}

public function show($code){
$short_url =Shorturls::where('short_url',$code)->first();
if($short_url){
    return redirect()->to(url($short_url->original_url));
}
return redirect()->to(url('/'));
}
}




/*public function index()
    {
        $shortLinks = ShortLink::latest()->get();

        return view('shortenLink', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = str_random(6);

        ShortLink::create($input);

        return redirect('generate-shorten-link')
             ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }*/


