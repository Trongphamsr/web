<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 08/02/2017
 * Time: 19:53
 */
?>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
