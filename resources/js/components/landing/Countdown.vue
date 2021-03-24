<template>
    <div class="countdown">
        <div class="border-circle"></div>
        <table>
            <thead>
            <tr>
                <th>
                    DAYS
                </th>
                <th></th>
                <th>
                    HOURS
                </th>
                <th></th>
                <th>
                    MINUTES
                </th>
                <th></th>
                <th>
                    SECONDS
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                     {{ days }}
                </td>
                <td>
                    :
                </td>
                <td>
                    {{ hours }}
                </td>
                <td>
                    :
                </td>
                <td>
                    {{ minutes }}
                </td>
                <td>
                    :
                </td>
                <td>
                    {{ seconds }}
                </td>
            </tr>
            </tbody>

        </table>
    </div>
</template>

<script>
export default {
    name: "Countdown",
    props: {
        startTime: {
            type: String,
            required: true,
        },
        endTime: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            timer: null,
            start: '',
            end: '',
            interval: null,
            days: '',
            minutes: '',
            seconds: '',
            hours: '',
        }
    },
    mounted() {
        this.start = new Date(this.startTime).getTime();
        this.end = new Date(this.endTime).getTime();
        this.timerCount(this.start, this.end);
        this.interval = setInterval(() => {
            this.timerCount(this.start, this.end);
        }, 1000);
    },
    methods: {
        timerCount: function(start,end){
            let now = new Date().getTime();

            let distance = start - now;
            let passTime =  end - now;

            if(distance < 0 && passTime < 0){
                clearInterval(this.interval);
                return;

            }else if(distance < 0 && passTime > 0){
                this.calcTime(passTime);
            } else if( distance > 0 && passTime > 0 ){
                this.calcTime(distance);
            }
        },
        calcTime: function(dist){
            this.days = Math.floor(dist / (1000 * 60 * 60 * 24));
            this.hours = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            this.minutes = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
            this.seconds = Math.floor((dist % (1000 * 60)) / 1000);
        }
    }
}
</script>
