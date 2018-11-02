<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;

class UsersController extends Controller
{
    /**
     * Handle the favorite request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request)
    {
        // check for login
        if(!Auth::user()){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }

        // validate the form data that we got via POST request
        $this->validate($request, [
            'favoriteCarId' => 'required|string',
            'userId' => 'required|numeric'
        ]);
        
        // Get id of current car we are adding as favorite
        $favoriteCarId = $request->input('favoriteCarId');
        // find the current user by id and get his data
        $user = User::findOrFail($request->input('userId'));
        // Get current favorites
        $userFavorites = json_decode($user->favorites);

        // if user does not have favorites create array of favorites and add the car to add
        if ($userFavorites == '' or $userFavorites == []){
            // add id to favorites when user has no favorites         
            $userFavorites[] = $favoriteCarId;
            Session::flash('success', 'Aan favorieten toegevoegd');
        }
        //if user has favorites save the favorites
        else {
            // If the id already exists in favorites remove it
            if (in_array($favoriteCarId, $userFavorites)){
                // remove the id
                $userFavorites = array_diff($userFavorites, array($favoriteCarId));
                // Reindex the array
                $userFavorites = array_values($userFavorites);
                Session::flash('success', 'Uit favorieten verwijderd');
            }
            // If the id does not exist add to favorites
            else {
                $userFavorites[] = $favoriteCarId;
                Session::flash('success', 'Aan favorieten toegevoegd');
            }
        }

        // Save changes to database
        $user->favorites = json_encode($userFavorites, JSON_NUMERIC_CHECK);
        $user->save();

        //redirect
        return redirect()->route('occasions.index');
    }
}
