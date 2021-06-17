<div class="row">
    <div class="col-lg-8 offset-lg-2 col-xm-12 offset-xm-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="display: block">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if( session('success') )
            <div class="alert alert-success text-center fade-out">
                {{ session('success') }}
            </div>
        @endif

        @if( session('success__updated') )
            <div class="alert alert-warning text-center fade-out">
                {{ session('success__updated') }}
            </div>
        @endif

        @if( session('success__deleted') )
            <div class="alert alert-danger deleted text-center fade-out">
                {{ session('success__deleted') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger deleted text-center fade-out">
                {{ session('error') }}
            </div>
        @endif

            @if (session('warning'))
                <div class="alert alert-warning text-center fade-out">
                    {{ session('warning') }}
                </div>
            @endif
    </div>
</div>
