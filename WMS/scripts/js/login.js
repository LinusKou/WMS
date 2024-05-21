const app = Vue.createApp({
    data() {
        return {
            username: '',
            password: ''
        };
    },
    methods: {
        login() {
            // 发送登录请求至 PHP 后端
            fetch('../scripts/php/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: this.username,
                    password: this.password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'start.html';
                } else {
                    alert('Invalid username or password');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
});

app.mount('#app');