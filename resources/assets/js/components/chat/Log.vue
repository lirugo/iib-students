<template>
    <div class="chat-log">
        <chat-message v-for="message in messages" :key="message.id" :message="message"></chat-message>
        <div class="empty" v-show="messages.length === 0">
            Nothing here yet...
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component chat-log mounted.');
        },
        props: ['messages']
    }
</script>

<style>
    .chat-log .chat-message:nth-child(even){
        background-color:#ccc;
    }
    .empty {
        padding: 1rem;
        text-align: center;
    }
</style>