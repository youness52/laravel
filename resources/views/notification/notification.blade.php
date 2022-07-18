@if (Session::has('notificationError'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                @foreach (session()->get('notificationError') as $item)
                    {{$item}}
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (Session::has('notification'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @foreach (session()->get('notification') as $item)
                {{$item}}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
