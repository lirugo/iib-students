<template>
    <div class="user-block">
        <!--Image of user-->
        <img width="75px" style="float: left; margin-right: 10px;"
             src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-business-man-399587fe24739d5a-512x512.png" />

        <!--Name user-->
        <p class="m-b-5"><strong>
            {{(user.surname + ' ' + user.name).length > 27 ? (user.surname + ' ' + user.name).substring(0, 27)+'...' : user.surname + ' ' + user.name}}
           <i class="fa fa-circle color-green"></i>
        </strong></p>

        <!--Show last message-->
        <p class="m-b-5" v-if="user.lastMessage">
            {{user.lastMessage.message.length > 30 ? user.lastMessage.message.substring(0,30) + '...' : user.lastMessage.message}}
        </p>

        <!--Show if not have message-->
        <p class="m-b-5" v-else>
            You did not communicate with user.
        </p>
        <!--Show time last message-->
        <small class="pull-right" v-if="user.lastMessage">{{user.lastMessage.created_at}}</small>
        <small class="pull-right" v-else></small>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component users mounted.');

            console.log(this.user);
        },
        props:['user']
    }
</script>

<style>
    .user-block{
        padding: 10px;
        margin-top: 10px;
        height:100px;
        background: white;
    }

    .user-block:hover {
        background: #363c4d;
        color: white;
    }
</style>
