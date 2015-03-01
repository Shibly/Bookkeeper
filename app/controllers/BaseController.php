<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }


    protected function view($path, $data = array())
    {
        $this->layout->content = View::make($path, $data);
    }

    /**
     * Redirect to specific named route
     *
     *
     * @param $route
     * @param array $params
     * @param array $data
     * @return mixed
     */

    protected function redirectRoute($route, $params = array(), $data = array())
    {
        return Redirect::route($route, $params)->with($data);
    }


    /**
     * Redirect back with old input and specific data
     *
     *
     * @param array $data
     * @return mixed
     */

    protected function redirectBack($data = array())
    {
        return Redirect::back()->withInput()->with($data);
    }


    /**
     * Redirect a logged in user to the previously intended url
     *
     *
     * @param null $default
     * @return mixed
     */


    protected function redirectIntended($default = null)
    {
        return Redirect::intended($default);
    }

}