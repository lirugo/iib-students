<template>
    <a v-on:click="active">
        <div class="navbar-toggler-icon"><span class="fa fa-bars color-white rotate"></span></div>
    </a>
</template>

<script>
    export default {
        mounted() {
            console.log('Component bars mounted.')
        },
        methods: {
            active: function(){
                //Show or hide nav-left
                $('#sidebar').toggleClass('active');
                //Rotate icon bars
                $(".rotate").toggleClass("down");
            }
        }
    }
</script>
