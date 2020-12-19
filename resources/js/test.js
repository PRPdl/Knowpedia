const axios = require('axios');

 fetchNotifications = () => {
    axios.get('/notifications/unreadCount').then(function (response)  {
        $data = response.data;
        if ($data !== null) {
            document.getElementById('notification').innerHTML = "You have " + $data +" notifications";
        }

    });
}


