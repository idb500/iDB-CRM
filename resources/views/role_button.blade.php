
<?php
$data2 = DB::table('model_has_roles')->join("roles", "roles.id", "=", "model_has_roles.role_id")->where(['model_has_roles.model_id'=>$id])->get();
  ?>

   @if(!empty($data2))
   @foreach($data2 as $v)
           <label class="badge badge-success">{{$v->name}}</label>
           @endforeach
      @endif