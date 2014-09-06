@extends('layouts.default')
@section('content')

<div class="page-header">
    <h1>Edit User {{{$user->username}}}</h1>
    <div class="btn-group pull-right">
        <a class="btn btn-default" href="{{{URL::to('users/delete/').'/'.$user->username}}}"><span class="glyphicon
        glyphicon-minus-sign"></span>
            Deactivate account</a>
         <a class="btn btn-default" href="{{{URL::to('users/password/').'/'.$user->username}}}"><span class="glyphicon
        glyphicon-minus-sign"></span>
            Change password</a>
    </div>
</div>


<?php echo Form::model($user, array(
    'class' => "form form-horizontal row",
    'role' => "form",
    'route' => array('users.update', $user->username),
    'files' => true,
    'method' => 'POST',
    ));
?>

<div class="col-sm-7">
<div class="form-group">
    <?php
    echo Form::label('name', 'Name', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <?php
        echo Form::text('name', null, array("class" => "form-control", "placeholder" => "Name"));
        ?>
    </div>
</div>


<div class="form-group">
    <?php
    echo Form::label('surname', 'Surname', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <?php
        echo Form::text('surname', null, array("class" => "form-control", "placeholder" => "Surname"));
        ?>
    </div>
</div>


<div class="form-group">
    <?php
    echo Form::label('email', 'email', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <?php
        echo Form::text('email', null, array("class" => "form-control", "placeholder" => "Email"));
        ?>
    </div>
</div>


<div class="form-group">
    <?php
    echo Form::label('address', 'Address', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <?php
        echo Form::text('address', null, array("class" => "form-control", "placeholder" => "Address"));
        ?>
    </div>
</div>

<div class="form-group">
    <?php
    echo Form::label('phone', 'Phone', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <?php
        echo Form::text('phone', null, array("class" => "form-control", "placeholder" => "Phone"));
        ?>
    </div>
</div>
<div class="form-group">
    <?php
    echo Form::label('role', 'Role', array("class" => "control-label col-sm-2"));
    ?>
    <div class="col-sm-10">
        <select class="selectpicker" name="role[]" multiple>
            @foreach (Role::all() as $role)

            <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected  @endif >{{$role->name}}</option>

            @endforeach


        </select>
    </div>


</div>

</div>

<div class="col-sm-5">

<div class="form-group">

    <label for="exampleInputFile" class="control-label col-sm-2">Photo</label>

    <div class="col-sm-10">

    @if(is_null($user->avatar->getUploadedFile()))
    No photo has been uploaded yet
    @else
    <img src="<?= URL::to($user->avatar->url('thumb')) ?>" >
    @endif


        <div class="input-group"><span class="input-group-btn"><span class="btn btn-info btn-file">Browse…
             <?= Form::file('avatar') ?>
                        </span></span>

                        <input type="text" class="form-control" readonly="">
        </div>
    </div>
</div>

</div>


<div class="form-group">
    <div class="pull-right col-sm-12">

        <?php
        echo Form::submit('Save', array("class" => "btn btn-lg btn-primary"));
        ?>
    </div>
</div>



{{ Form::close() }}
@stop