<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ################# This is two another way to upload Files##################
        // $path = Storage::putFile('image', new File($request->image));
        // $path = $request->file('image')->store('players', 'image');
        ###########################################################################

        $rules = $this->getRules();
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $file_ext = $request->image->extension(); // get image extension.
        $file_name = time() . '.' . $file_ext; // named image.
        $path = 'images/players'; // set path that image will be uploaded on it.
        $request->image->move($path, $file_name); // Upload image.

        // Insert Data to Database.
        $addPlayer = Player::create([
            'name'      => $request->name,
            'age'       => $request->age,
            'address'   => $request->address,
            'image'     => $file_name,
        ]);
        if($addPlayer){
            return response()->json(['success' => 'Player Added Successfully']);
        } else {
            return response()->json(['error' => 'Something went wrong please try again']);
        }
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
        $playerID = Player::find($id);
        if ($playerID) {
            $playerID->delete();
            return response()->json(['status' => 'success', 'msg' => 'Player Deleted Successfully', 'id' => $id]);
        } else {
            return response()->json(['status' => 'danger', 'msg' => 'Something went wrong please try again']);
        }
    }

    public function getRules()
    {
        return [
            'name' => 'required|min:2|max:100|unique:Players,name|string',
            'age' => 'required|numeric|min:18|max:55',
            'address' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg',
        ];
    }
}
