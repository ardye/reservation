@if (Session::has('flash_message'))
	<div class="alert alert-success alert-dismissible {{ Session::has('penting') ? 'alert-important' : '' }}">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      		<h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ Session::get('flash_message') }}
    </div>
@endif