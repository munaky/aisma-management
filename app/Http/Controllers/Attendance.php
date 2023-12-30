<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Attendance extends Controller
{
    public function __invoke(Request $req, $action)
    {
        if (method_exists($this, $action)) {
            return $this->$action($req);
        } else {
            return false;
        }
    }

    private function present(Request $req){
        $uid = $req->get('uid');

        $card = $this->models['card']::where('uid', $uid)->first();

        $employee = $this->models['employee']::where('cards_id', $card->id)->first();

        $attendance = $this->models['attendance_history']::firstOrCreate([
            'employees_id' => $employee->id,
            'time' => date('H:i'),
            'date' => date('d/m/Y'),
        ]);

        if($attendance == null){
            return 'false';
        }

        return 'true';
    }
}
