<a class="edit btn btn-info edit-user" href="{{ route('users.index') }}/{{$id}}">Show</a>
@can('user-edit')
       <a class="edit btn btn-success edit-user" href="{{ route('users.index') }}/{{$id}}/edit">Edit</a>
       @endcan
            @can('user-delete')
       {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan