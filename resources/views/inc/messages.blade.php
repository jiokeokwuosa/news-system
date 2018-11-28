<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6 center">
            @if (count($errors)>0)
   
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                            {{$error}}
                    </div>
                @endforeach
            

            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif


        </div>

        <div class="col-md-3"></div>
    </div>

</div>
