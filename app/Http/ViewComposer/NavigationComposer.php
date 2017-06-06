<?php

namespace App\Http\ViewComposer;

use illuminate\View\View;
use Auth;
/**
 *
 */
class NavigationComposer
{

  function compose(View $view)
  {
    if (!Auth::check()) {
      return;
    }
    
    $view->with('channel', Auth::user()->channel()->first());
  }
}
