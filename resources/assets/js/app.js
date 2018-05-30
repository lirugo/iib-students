
  /**
  * First we will load all of this project's JavaScript dependencies which
  * includes Vue and other libraries. It is a great starting point when
  * building robust, powerful web applications using Vue and Laravel.
  */

    require('./bootstrap');

    window.Vue = require('vue');

  /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */

    Vue.component('example-component', require('./components/ExampleComponent.vue'));
    Vue.component('clock', require('./components/clock/Clock.vue'));
    Vue.component('bars', require('./components/menu/Bars.vue'));

    //Chat
    Vue.component('chat-message', require('./components/chat/Message.vue'));
    Vue.component('chat-log', require('./components/chat/Log.vue'));
    Vue.component('chat-composer', require('./components/chat/Composer.vue'));
    Vue.component('user-block', require('./components/chat/users/User.vue'));
    Vue.component('users-list', require('./components/chat/users/Log.vue'));

    const app = new Vue({
        el: '#app',
        data: {
            messages: [],
            usersInRoom: [],
            users: []
        },
        methods: {
            addMessage(message){
                // add message
                this.messages.push(message);
                // persist to database
                axios.post('/messages', message).then(response => {

                });
            }
        },
        created(){
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });

            axios.get('/users').then(response => {
                this.users = response.data;
            });

            Echo.join('chat')
                .here((users) => {
                    this.usersInRoom = users;
                })
                .joining((user) => {
                    this.usersInRoom.push(user);
                })
                .leaving((user) => {
                    this.usersInRoom = this.usersInRoom.filter(u => u != user);
                })
                .listen('MessagePosted', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                    console.log(e);
                });
        }
});