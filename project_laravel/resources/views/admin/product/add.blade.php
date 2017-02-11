@extends('admin.master');
@section('content');

    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>Add</small>
        </h1>
    </div>
    
    <!-- /.col-lg-12 -->
    <form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.up.erroer')
        
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="sltParent">
                    <option value="">Please Choose Category</option>
                    <!--tạo hàm đệ quy-->
                    <?php  cate_parent($cate, 0,"--", old('sltParent')); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter price" value="{!! old('txtPrice') !!}" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
                <script type="text/javascript">ckeditor("txtIntro")</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" value="{!! old('fImages') !!}">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyword') !!}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription') !!}</textarea>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Invisible
                </label>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
    	@for($i=1; $i<=10;$i++)
        	<div>
            	<label>image product detail{!! $i !!}</label>
                <input type="file" name="fProductdetail" />
            </div>
        @endfor
    </div>
    	</form>
@endsection();
<?php
function cate_parent($data, $parent = 0, $srt="--", $select=0){
    foreach ($data as $val){
        $id= $val['id'];
        $name= $val['name'];
        if($val["parent_id"]==$parent){
            if($select !=0 && $id==$select){
                echo"<option value='$id' selected='selected>$srt $name</option>";
            }else{
                echo"<option value='$id'> $srt $name</option>";
            }
            cate_parent($data, $id, $srt."--");
        }
    }
}

?>