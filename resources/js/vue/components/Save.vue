<template>

    <form @submit.prevent="submit">

      <o-field label="Nombre" :variant="errors.name ? 'danger' : 'primary'" :message="errors.name">
        <o-input v-model="form.name" model-value=""></o-input>
      </o-field>

      <o-field label="Comentario" :variant="errors.comment ? 'danger' : 'primary'" :message="errors.comment">
        <o-input v-model="form.comment" type="textarea" model-value=""></o-input>
      </o-field>

      <o-field label="Categoria" :variant="errors.category_id ? 'danger' : 'primary'" :message="errors.category_id">
        <o-select v-model="form.category_id" placeholder="Selecione una categoria">
            <option v-for="c in categories" v-bind:key="c.id" :value="c.id">
              {{c.title}}
            </option>
        </o-select>
      </o-field>

      <o-field label="Posteado" :variant="errors.posted ? 'danger' : 'primary'" :message="errors.posted">
        <o-select v-model="form.posted" placeholder="Selecione una estado">
            <option value="yes">Si</option>
            <option value="not">No</option>
        </o-select>
      </o-field>

      <o-button native-type="submit" variant="primary">Enviar</o-button>

    </form>

</template>

<script>
export default {

    data(){
        return{
            categories: [],
            form:{
              name: '',
              posted: '',
              category_id: '',
              comment: ''
            },
            errors:{
              name: '',
              posted: '',
              category_id: '',
              comment: ''
            }
        }
    },

    methods:{

      cleanErrorsForm(){
        this.errors.name = ''
        this.errors.comment = ''
        this.errors.category_id = ''
        this.errors.posted = ''
      },

      submit(){
        console.log(this.form)

        this.cleanErrorsForm()

        this.$axios.post('/api/posts',

          this.form
        
        ).then(res => {

          console.log(res)
                
        }).catch(error => {

          const {data} = error.response;

          if (data.name) {
            this.errors.name = data.name[0]
          }
          if (data.comment) {
            this.errors.comment = data.comment[0]
          }
          if (data.category_id) {
            this.errors.category_id = data.category_id[0]
          }
          if (data.posted) {
            this.errors.posted = data.posted[0]
          }

          console.log({data})

        })

      },

        getCategory(){
          this.$axios.get('/api/category/all').then((res) => {
                this.categories = res.data
                
          })
        }
    },

    async mounted(){

      console.log();


      this.getCategory()

    }
}
</script>
