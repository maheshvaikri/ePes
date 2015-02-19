<?php

class SupervisorsController extends \BaseController {


    public function index()
    {
        return View::make('supervisors.dashboard');
    }

    public function accomplishments()
    {
        $users = User::where('department_id', '=', Auth::getUser()->department_id)->get();
        return View::make('supervisors.accomplishments', compact('users'));
    }

    public function singleAccomplishments($id)
    {

        $from = '';
        $to   = '';

        if (Input::has('from') && Input::has('to')) {
            $from = strtotime(Input::get('from'));
            $to = strtotime(Input::get('to'));

            $accomplishments = UsersAccomplishment::where('employee_no', '=', $id)
                ->where('dateto', '>=', $from)
                ->where('dateto', '<=', $to)
                ->get();
        } else {
            $accomplishments = UsersAccomplishment::where('employee_no', '=', $id)->get();
        }

        print_r($accomplishments);
        return View::make('supervisors.singleaccomplishments', compact('accomplishments'));
    }
}