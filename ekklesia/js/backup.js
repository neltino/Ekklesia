var app = new Vue({
    el: "#app",
    data: {
    },
    methods: {
        no: function(){
            window.location = 'landing.php';
        },
        yes: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(back);
                const reply = await fetch('view/backup.php', {
                    method: 'POST',
                    body: formdata
                  });
                  result = await reply.text();
                  alert(result);


        },
        yesoo: async (e)=>{
            e.preventDefault();
            const formdata = new FormData(reset);
                const reply = await fetch('view/reset.php', {
                    method: 'POST',
                    body: formdata
                  });
                  result = await reply.text();
                  alert(result);


        }
    }
});
