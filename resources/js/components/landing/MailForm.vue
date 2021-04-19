<template>
    <div>
        <div v-show="!sent" key="form" class="mailing-signup">
            <label for="name">
                        <span class="label">
                            Your Name
                        </span>
                <input required id="name" type="text" name="name" v-model="name" placeholder="Your name">
            </label>

            <label for="email">
                          <span class="label">
                           Your Email Address
                        </span>
                <input id="email" required type="email" name="email" v-model="email" placeholder="Email Address">
            </label>
            <button class="btn-c2a" @click.prevent="send">Subscribe</button>
        </div>
        <div v-show="sent" class="thanks" key="thanks">
            <p>
                Welcome to the club 😎 <br> you'll now receive our emails!
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "MailForm",
    props: {
        apiUrl: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            sent: false,
            name: '',
            email: '',
        }
    },
    methods: {
        send() {
            axios.post(this.apiUrl, this.$makeForm({
                'name': this.name,
                'email': this.email,
            }))
                .then(res => {
                    this.sent = true;
                })
                .catch(err => {
                    console.error(err.message);
                })
            this.sent = true;
        }
    }
}
</script>
