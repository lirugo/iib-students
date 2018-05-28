<template>
    <div class="chat-composer">
        <input type="text" class="form-control" placeholder="Start typing message..."
               v-model="messageText" @keyup.enter="sendMessage" autofocus/>
        <button class="btn btn-primary"  @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component chat-message mounted.')
        },
        props: ['user'],
        data() {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage: function(){
                var us = JSON.parse(this.user);
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: {
                        name: us.name,
                        surname:  us.surname
                    }
                });
                this.messageText = '';
            }
        }
    }
</script>

<style>
    .chat-composer{
        display: flex;
    }
</style>
