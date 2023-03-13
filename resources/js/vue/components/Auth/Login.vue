<template>
    <form @submit.prevent="submit">

        <o-field 
            :variant="errors.login ? 'danger' : 'primary'" 
            message=""
            label="Username"
        >
            <o-input v-model="form.email">

            </o-input>

        </o-field>

        <o-field 
            :variant="errors.login ? 'danger' : 'primary'" 
            :message="errors.login"
            label="Password"
        >
            <o-input v-model="form.password" type="password">

            </o-input>

        </o-field>

        <o-button native-type="submit" variant="primary">Enviar</o-button>

    </form>
</template>

<script>
export default {
    // !!!!!!!!!!!!!!!!!!!  mount
    created() {
        if (this.$root.isLoggedIn) {
            this.$router.push({name: 'list'})
        }
    },
    // !!!!!!!!!!!!!!!!!!! data
    data() {
        return {
            form:{
                email: '',
                password: '',                
            },
            errors:{
                login: ''
            },
        }
    },
    // !!!!!!!!!!!!!!!!!  methods
    methods: {
        cleanErrorsForm(){
            this.errors.login = ''
        },
        submit(){

            //clean box
            this.cleanErrorsForm()

            this.$axios.post('/api/user/login',

                this.form
        
            ).then(res => {

                this.$root.setCookieAuth(res.data);

                // console.log(res)
                setTimeout(() => (window.location.href = "/vue"), 1500)
                // oruga mesage 
                this.$oruga.notification.open({
                    message: 'Bienvenid@',
                    duration: 1000,
                    closable: true
                })
                    
            }).catch(error => {

                const {data} = error.response;           

                // console.log({data})

                if (data) {
                    this.errors.login = data
                }

            })
        },
        

    },
    
}
</script>