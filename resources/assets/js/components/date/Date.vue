<template>
        <div>
                {{time}}
                <br/>
                {{date}}
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                time: '14:27:36',
                date: '2018-08-20 SUN'
            };
        }
    }


</script>
