<?php
namespace WI\Locale;
use App\Http\Controllers\Controller;
use WI\User\User;

class LocaleController extends Controller {


  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $users = User::all();
    return view('locale::index',compact('users'));
  }
}