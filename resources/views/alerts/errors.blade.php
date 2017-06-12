@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </div>

@endif