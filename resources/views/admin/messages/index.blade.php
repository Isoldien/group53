<script>

    window.addEventListener("load", () => {
        Pusher.logToConsole = true;

        Echo.private('stock-channel')
            .listen('.stock_event', (e) => {
                //This is a simple test case
                //Also, do NOT forget to add the dot in front of the name of the event as defined in broadCastAs in the App/Events
                alert(e.no_of_low_stock);
                alert(e.no_out_of_stock);

            })
            .listen('.message_event', (e) => {
                alert(e.message);
                alert(e.title);
            });

    });

</script>
