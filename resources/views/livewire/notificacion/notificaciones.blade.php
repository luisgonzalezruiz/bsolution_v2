<div>

    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="fe-bell noti-icon"></i>
        <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $count }}</span>
    </a>

    <script>

        document.addEventListener('DOMContentLoaded', function(){
            //************************************************************
            // de esta manera emitimos un evento mediante pusher
            //************************************************************

            Pusher.logToConsole = true;
            var pusher = new Pusher('2e7c67c07475dd8c71f0', {
                cluster: 'us2',
                forceLTS: true
            });

            var channel = pusher.subscribe('category-channel');
            channel.bind('category-event', function(data) {
                window.livewire.emit('infoGlobal',JSON.stringify(data));
            });

            //************************************************************


        });

    </script>

</div>
