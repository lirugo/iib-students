<template>
    <div class="users-list">
        <user-block v-for="user in users" :key="user.id" :user="user" class="user-block"></user-block>
        <div class="empty" v-show="users.length === 0">
            Nothing here yet...
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component users-list mounted.');
        },
        props: ['users']
    }
</script>

<style>
    .empty {
        padding: 1rem;
        text-align: center;
    }
</style>