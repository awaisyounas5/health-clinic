<div class="notification-box">
    <div class="msg-sidebar notifications msg-noti">
        <div class="topnav-dropdown-header">
            <span>Messages</span>
        </div>
        <div class="drop-scroll msg-list-scroll" id="msg_list">
            <ul class="list-box">
                @if(Auth::user()->notifications)
                @foreach (Auth::user()->unreadNotifications as $notification)
                <li>
                    <a data-notification-id="{{ $notification->id }}" onclick="markAsUnread(this)">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">R</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">{{$notification->data['title']}}</span>
                                <span class="message-time">{{$notification->created_at}}</span>
                                <div class="clearfix"></div>
                                <span class="message-content">{{$notification->data['description']}}</span>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
                @endif


            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="chat.html">See all messages</a>
        </div>
    </div>
</div>
<script>
     function markAsUnread(element) {
        var notificationId = $(element).data('notification-id');
        $.ajax({
            url: '/notifications/' + notificationId + '/read',
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {

                    window.location.reload();

            }
        });
    }
</script>
