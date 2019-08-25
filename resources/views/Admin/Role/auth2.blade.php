@extends('Admin.AdminPublic.adminpublic')
@section('admin')                                                            
<div class="container">
    <div class="mws-panel-body no-padding"> 
     <form class="mws-form" action="/saveauth" method="post"> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">权限信息</label> 
        <div class="mws-form-item clearfix"> 
         <h4>当前角色:{{$role->name}}的权限信息</h4> 
         <table border="1" width="100%">
         @foreach($auths as $k=>$auth)
           <tr>
            <td><input type="checkbox" name="nids[]" value="{{$auth->id}}" @if(in_array($auth->id,$nids)) checked @endif>{{$auth->name}}</td>
            </tr>
          @endforeach  
         </table>                        
        </div> 
       </div> 
      </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="rid" value="{{$role->id}}">
       <input value="分配权限" class="btn btn-danger" type="submit"> 
       <input value="Reset" class="btn " type="reset"> 
      </div> 
     </form> 
    </div> 
    <!-- Panels End --> 
   </div>                                                 
@endsection
@section('title','后台分配权限')