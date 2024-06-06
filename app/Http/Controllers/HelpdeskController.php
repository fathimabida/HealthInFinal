<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helpdesk;

class HelpdeskController extends Controller
{
    public function helpdeskPage()
    {
        $links = Helpdesk::all();

        return view('/mahasiswa/helpdesk', compact('links'));
    }

    //show kontak helpdesk admin
    public function helpdeskAdmin(){

        $helpdesks = Helpdesk::all();

        return view('/admin/helpdesk/helpdeskAdmin', compact('helpdesks'));
    
    }

     // show update page
     public function update(Request $request, $id)
     {
         $helpdesk = Helpdesk::findOrFail($id);
         return view('/admin/helpdesk/updateHelpdesk', compact('helpdesk'));
     }
 
     // Assign Value After Changes
     public function replace(Request $request, $id) {
 
         $helpdesk = Helpdesk::findOrFail($id);
 
         $helpdesk->nama_layanan = $request->nama_layanan;
         $helpdesk->link_direct = $request->link_direct;
 
         $helpdesk->save();
 
         return redirect(route('helpdeskAdmin'));
 
     }
}
