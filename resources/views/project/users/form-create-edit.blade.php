<form id="create-user" method="post" action="{{ $action }}" novalidate enctype="multipart/form-data">
    @csrf
    @isset($user)
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $user->id }}" />
    @endisset
    <div class="row">
        <input type="hidden" name="avatar-status" id="avatar-status" value="1" />
        <div class="col-12 col-lg-6 mb-2">
            <label for="avatar">{{__('global.avatar')}}</label>
            <input id="image" style="box-sizing: inherit!important;" type="file" name="avatar" data-height="100%" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{old('avatar', isset($user) && $user->getMedia('avatar')->count() > 0 ? asset($user->getMedia('avatar')->first()->getUrl()) : '')}}" />
        </div>
        <div class="col-12 col-lg-6">
        <x-inputs.text label="global.username" name="username" required="required" id="username" value="{{ old('username', isset($user) ? $user->username : '') }}"/>
        <x-inputs.text label="global.name" name="name" id="name" value="{{ old('name', isset($user) ? $user->name : '') }}"/>
        <x-inputs.text label="global.surname" name="surname" id="surname" value="{{ old('surname', isset($user) ? $user->surname : '') }}"/>
        <x-inputs.email label="global.email" name="email" required="required" id="email" value="{{ old('email', isset($user) ? $user->email : '') }}"/>
        <x-inputs.password label="global.password" name="password" id="password"/>
        <x-inputs.password label="global.password_confirmation" name="password_confirmation" id="password_confirmation"/>
        <x-selects.basic label="global.role" :options="$selectrole" optionValue="id" display="name" name="selectrole" id="selectrole" selected="{{isset($user) ? $user->roles->first()->name : 'admin'}}"/>

        </div>
    </div>
    <div class="row">
        <x-buttons.button col="col-12" label="global.save" type="submit" color="primary" class="float-right"/>
    </div>
</form>
