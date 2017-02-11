<?php

namespace App\Http\Controllers;
use App\Http\Requests\cate_request;
use Illuminate\Http\Request;
use App\cate;

class cate_controller extends Controller
{
    public function getList(){
        //đổ sữ liệu ra
        $data= cate::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
        return view('admin.cate.list', compact('data'));
    }
    public function getAdd(){
        $parent=cate::select('id', 'name', 'parent_id')->get()->toArray();
        // dungf compact truyền parent sang view ->add
        return view('admin.cate.add', compact('parent'));
    }

    public function postAdd(cate_request $request){
       // print_r($request->txtCateName);

        $cate= new cate;


        $cate->name        = $request->txtCateName;
        $cate->alias       = $request->txtCateName;
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->sltParent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'success !! complate add category ']);
    }

    public function getDelete($id){
        $parent= cate::where('parent_id', $id)->count();
        if($parent==0)
        {
            $cate= cate::find($id);
            $cate->delete($id);
            return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'success !! delete ok']);
        }
        else{
            echo"<script type='text/javascript'>
                    alert('sorry ! you can not delete')
                    window.location='";
                    echo route('admin.cate.list');
                    echo"'
            </script>";
        }

          }

    public function getEdit($id){
        $data=cate::findOrFail($id)->toArray();
        $parent=cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.cate.edit', compact('parent','data', 'id'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request,
            ['txtCateName'=>'required'],
            ['txtCateName.required'=>'pleas enter name category']
            );
        $cate= cate::find($id);
        // cập nhập
        $cate->name        = $request->txtCateName;
        $cate->alias       = $request->txtCateName;
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->bltParent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'success !! complate edits category ']);
    }
}