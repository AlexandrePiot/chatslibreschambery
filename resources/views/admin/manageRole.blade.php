@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    Gérer les permissions
                    <a class="float-right" href="{{ route('groups') }}">Retour <i class="fa fa-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <div class="card-body container">
                        <form method="GET" action="{{ route('manageRole',$roleId) }}">
                            @csrf

                            @foreach($permissionGroup as $permission)
                                @if (in_array($permission, $permissions)) 
                                    {{ Form::checkbox('checkList[]', $permission, true, ['class' => 'checkbox-perm']) }}
                                @else
                                    {{ Form::checkbox('checkList[]', $permission, null, ['class' => 'checkbox-perm']) }}
                                @endif
                                {{ $permission }}<br>
                            @endforeach
                            <!-- valider le formulaire -->
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary" value="Submit">Enregistrer</button>
                            </div>
                            @if($message != "")
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$message}}
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection