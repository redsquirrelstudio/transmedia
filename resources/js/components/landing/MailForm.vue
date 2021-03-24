<template>
    <div>
        <transition-group name="fade">
            <form ref="form" v-show="!sent" key="form"
                  action="https://transmediawinchester.us1.list-manage.com/subscribe/post?u=0c295aac87ca7c2f04d4094ec&amp;id=6f6aca5480"
                  method="post" id="mc-embedded-subscribe-form" target="_blank" novalidate class="mailing-signup">
                <div class="half">
                    <label for="FNAME">
                        <span class="label">
                            Your First Name
                        </span>
                        <input required type="text" name="FNAME" placeholder="Your first name">
                    </label>
                </div>
                <div class="half">
                    <label for="LNAME">
                        <span class="label">
                            Your Last Name
                        </span>
                        <input required type="text" name="LNAME" placeholder="Your last name">
                    </label>
                </div>

                <label for="EMAIL">
                          <span class="label">
                            Email Address
                        </span>
                    <input required type="email" name="EMAIL" placeholder="Email Address">
                </label>
                <button type="submit" @click.prevent="send">Subscribe</button>
            </form>
            <div v-show="sent" class="thanks" key="thanks">
                <p>
                    Thank you, you'll now receive our emails!
                </p>
            </div>
        </transition-group>
    </div>
</template>

<script>
export default {
    name: "MailForm",
    data() {
        return {
            sent: false,
        }
    },
    methods: {
        send() {
            this.sent = true;
            setTimeout(() => {
                this.$refs.form.submit();
            }, 1000);
        }
    }
}
</script>
