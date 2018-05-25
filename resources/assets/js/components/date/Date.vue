<template>
    <div class="clock-main">
        <div class="clock-time text-center">{{time}}</div>
        <hr class="no-m-p">
        <div class="text-center">{{date}}</div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                time: '',
                date: '',
                days: [
                    'Sun',
                    'Mon',
                    'Tu',
                    'We',
                    'Th',
                    'Fr',
                    'Sa'
                ]
            };
        },
        methods: {
            startTime: function () {
                var today = new Date()
                var h = today.getHours()
                var m = today.getMinutes()
                var s = today.getSeconds()
                m = this.checkFormat(m)
                s = this.checkFormat(s)
                this.time =  h + ":" + m + ":" + s
                var t = setTimeout(this.startTime, 500)
            },
            checkFormat: function (i) {
                if (i < 10) {i = "0" + i}  // add zero in front of numbers < 10
                return i
            },
            getDate : function(){
                var today = new Date()
                var y = today.getFullYear()
                var m = this.checkFormat(today.getMonth()+1)
                var d = this.checkFormat(today.getDate())
                var day = today.getDay()
                this.date = y + '-' + m + '-' + d + ' ' + this.days[day];
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.startTime();
            this.getDate();

        }
    }


</script>
