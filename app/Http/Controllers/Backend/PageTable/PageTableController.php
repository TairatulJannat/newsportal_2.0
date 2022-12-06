<?php

namespace App\Http\Controllers\Backend\PageTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PageTable;

class PageTableController extends Controller
{
    //
    public function index()
    {
       return view('backend.pagetables.pagetable_index');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'page_title_bn' => 'required:page_tables,page_title_bn',
            'page_title_en' => 'required:page_tables,page_title_en',
            // 'description_title_bn' => 'required:page_tables,description_title_bn',
            // 'description_title_en' => 'required:page_tables,description_title_en',
        ],
        [
            'page_title_bn.required' => 'Page title bangla is required',
            'page_title_en.required' => 'Page title english is required',
            // 'description_title_bn.required' => 'Description title is required',
            // 'description_title_en.required' => 'Description title is required',
        ]);

        $pagetable = PageTable::where('page_type' , $request->page_type )->first();
        if(isset($pagetable)){
            $pagetable->page_type = $request->page_type;
            $pagetable->page_title_bn = $request->page_title_bn;
            $pagetable->page_title_en = $request->page_title_en;
            $pagetable->description_title_bn = $request->description_title_bn;
            $pagetable->description_title_en = $request->description_title_en;
            $pagetable->update();
        }
        else{
           
            $pagetable = new PageTable();
            $pagetable->page_type = $request->page_type;
            $pagetable->page_title_bn = $request->page_title_bn;
            $pagetable->page_title_en = $request->page_title_en;
            $pagetable->description_title_bn = $request->description_title_bn;
            $pagetable->description_title_en = $request->description_title_en;
            $pagetable->save();
        }
        

        $notification = array(
            'success' => 'pagetable Created Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }
     public function show()
     {
       $pagetables = PageTable::all();
       return view ('backend.pagetables.view_pagetable',['pagetables'=> $pagetables]);

     }

     public function edit($id)
     {
       $pagetables = PageTable::find($id);
       return view ('backend.pagetables.edit_pagetable',['pagetables'=> $pagetables]);

     }

     public function update(Request $request)
    {   
        
        // dd($request);
        // return $request;
        $this->validate($request, [
             'page_title_bn' => 'required:page_tables,page_title_bn',
             'page_title_en' => 'required:page_tables,page_title_en',
            
        ],
        [
            'page_title_bn.required' => 'Page title bangla is required',
            'page_title_en.required' => 'Page title english is required',
        ]);

        $pagetable = PageTable::find($request->id);
        $pagetable->page_type = $request->page_type;
        $pagetable->page_title_bn = $request->page_title_bn;
        $pagetable->page_title_en = $request->page_title_en;
        $pagetable->description_title_bn = $request->description_title_bn;
        $pagetable->description_title_en = $request->description_title_en;
        $pagetable->update();

        $notification = array(
            'success' => 'Page Table updated Successfully !',
        );
        return redirect()->back()->with($notification);
   
    }

    public function destroy($id){

        $pagetable = PageTable::find($id);
        $pagetable->delete();

        $notification = array(
            'message' => 'Pagetable Deleted Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
