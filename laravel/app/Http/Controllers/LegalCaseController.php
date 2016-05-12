<?php

namespace App\Http\Controllers;

use Cache;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalCaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $legal_cases = \App\LegalCase::all()->sortByDesc("created_at");
        return view('cases.index', [
            'legal_cases' => $legal_cases
        ]);
    }

    public function getLegalCase($account, $id)
    {
        $legal_case = \App\LegalCase::find($id);
        $legal_case_statuses = \App\LegalCaseStatus::all();
        return view('cases.case', [
            'legal_case' => $legal_case, 
            'legal_case_statuses' => $legal_case_statuses,
            'users' => \App\User::all()
        ]);
    }

    public function deleteLegalCase($account, $id)
    {
        $legal_case = \App\LegalCase::find($id);
        $legal_case->delete();

        Session::flash('notify-success', 'Successfully deleted Case #'.$id.'.');

        return redirect('/cases');
    }

    public function getStatusChange($account, $id, $status)
    {
        $legal_case = \App\LegalCase::find($id);
        $legal_case->legal_case_status_id = $status;
        $legal_case->save();
        
        Session::flash('notify-success', 'Case status has been updated.');
        $legal_case_log = \App\LegalCaseLog::firstOrCreate([
            'type' => 'info',
            'value' => Auth::user()->nameLink().' changed case status to "'.$legal_case->legal_case_status->name.'".',
            'legal_case_id' => $legal_case->id
        ]);
        $legal_case_log->save();

        return redirect('/case/'.$id);
    }

    public function postLegalCaseAction(Request $request, $account, $id)
    {
        $legal_case_action = new \App\LegalCaseAction;
        $legal_case_action->legal_case_id = $id;
        $legal_case_action->type = $request->input('type');
        if ($request->input('deadline')) {
            $legal_case_action->deadline = date("Y-m-d H:i:s", strtotime($request->input('deadline')));
        }
        $legal_case_action->heading = $request->input('title');
        $legal_case_action->value = $request->input('body');
        $legal_case_action->user_id = $request->input('user');
        $legal_case_action->save();

        if ($request->input('deadline')) {
            $legal_case = \App\LegalCase::find($id);
            $legal_case->next_deadline = date("Y-m-d H:i:s", strtotime($legal_case_action->deadline));
            $legal_case->save();
        }
        
        Session::flash('notify-success', 'Case action has been added.');
        $legal_case_log = \App\LegalCaseLog::firstOrCreate([
            'type' => 'info',
            'value' => Auth::user()->nameLink().' added an action to this case.',
            'legal_case_id' => $id
        ]);
        $legal_case_log->save();

        return array('success' => 'true');
    }

    public function postLegalCaseNote(Request $request, $account, $id)
    {
        $legal_case_note = new \App\LegalCaseNote;
        $legal_case_note->legal_case_id = $id;
        $legal_case_note->heading = $request->input('title');
        $legal_case_note->value = $request->input('body');
        $legal_case_note->save();
        
        Session::flash('notify-success', 'Case note has been added.');
        $legal_case_log = \App\LegalCaseLog::firstOrCreate([
            'type' => 'info',
            'value' => Auth::user()->nameLink().' added a note to this case.',
            'legal_case_id' => $id
        ]);
        $legal_case_log->save();

        return array('success' => 'true');
    }

    public function postLegalCaseFile(Request $request, $account, $id)
    {
        if ($request->hasFile('doc') && $request->file('doc')->isValid()) {
            $legal_case_file = new \App\LegalCaseFile;
            $legal_case_file->legal_case_id = $id;
            $legal_case_file->user_id = Auth::user()->id;
            $legal_case_file->name = $request->file('doc')->getClientOriginalName();
            $legal_case_file->save();

            $path = storage_path().'/files/';
            $request->file('doc')->move($path.$legal_case_file->name);
            
            Session::flash('notify-success', 'Case document has been uploaded.');
            $legal_case_log = \App\LegalCaseLog::firstOrCreate([
                'type' => 'info',
                'value' => Auth::user()->nameLink().' added a document to this case.',
                'legal_case_id' => $id
            ]);
            $legal_case_log->save();

            return redirect('/case/'.$id);

        } else {
            Session::flash('notify-failure', 'Document could not be uploaded.');
            return redirect('/case/'.$id);
        }
    }

    public function updateLegalCase(Request $request, $account)
    {
        $id = $request->input('pk');
        $name = $request->input('name');
        $value = $request->input('value');

        $legal_case = \App\LegalCase::find($id);
        if ($name != 'id') {
            if ($name == 'case-type') {
                $legal_case_type = \App\LegalCaseType::firstOrCreate(['name' => trim($value)]);
                $legal_case_type->save();
                $legal_case->legal_case_type_id = $legal_case_type->id;
            } else {
                $legal_case[$name] = $value;
            }
        }
        $legal_case->save();

        return array('success' => 'true');
    }

    public function deleteLegalCaseFile(Request $request, $account, $case_id, $file_id)
    {
        $legal_case_file = \App\LegalCaseFile::find($file_id);
        $path = storage_path().'/files/'.$legal_case_file->name;
        unlink($path);

        $legal_case_file->delete();

        Session::flash('notify-success', 'Case document has been deleted.');
        $legal_case_log = \App\LegalCaseLog::firstOrCreate([
            'type' => 'info',
            'value' => Auth::user()->nameLink().' deleted a document attached to this case.',
            'legal_case_id' => $case_id
        ]);
        $legal_case_log->save();

        return array('success' => 'true');
    }
}
