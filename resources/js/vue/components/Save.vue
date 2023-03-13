<template>

    <h1 v-if="post">Actualizar Post: <span class="font-bold"> {{post.slug}}</span></h1>

    <h1 v-else>Crear Post</h1>

    <form @submit.prevent="submit">      

      <div class="grid grid-cols-2 gap-3">     

        <div class="col-span-2">
          <o-field label="Nombre" :variant="errors.name ? 'danger' : 'primary'" :message="errors.name">
            <o-input v-model="form.name" model-value=""></o-input>
          </o-field>
        </div>        

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
      </div>

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
            },
            post: ''
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
        // console.log(this.form)

        const config = {
          // headers: { Authorization: `Bearer ${this.$cookies.get('auth').token}`}
          headers: { Authorization: "Bearer " + this.$root.token}
        }

        this.cleanErrorsForm()

        if (this.post == '')         
        
        //! insert
        return this.$axios.post('/api/posts',this.form, config
        
        ).then(res => {

          // console.log(res)
          //oruga mesage 
          this.$oruga.notification.open({
            message: 'Registro procesado',
            duration: 4000,
            closable: true
          })
                
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

          // console.log({data})

        })

        //! update
        this.$axios.patch('/api/posts/'+ this.post.id,

          this.form, config
        
        ).then(res => {

          // console.log(res)
          //oruga mesage 
          this.$oruga.notification.open({
            message: 'Registro procesado',
            duration: 4000,
            closable: true
          })
                
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

          // console.log({data})

        })

      },

      getCategory(){

        const config = {
          // headers: { Authorization: `Bearer ${this.$cookies.get('auth').token}`}
          headers: { Authorization: "Bearer " + this.$root.token}
        }

        this.$axios.get('/api/category/all', config).then((res) => {
          this.categories = res.data
                
        })
      },

      async getPost(){
        const config = {
          // headers: { Authorization: `Bearer ${this.$cookies.get('auth').token}`}
          headers: { Authorization: "Bearer " + this.$root.token}
        }

        this.post = await this.$axios.get('/api/posts/slug/'+ this.$route.params.slug, config);
        this.post = this.post.data
      },

      initPost(){

        const {category_id, created_at, id, name, posted, slug, updated_at } = this.post

        this.form.name = name
        this.form.comment = ''
        this.form.posted = posted
        this.form.category_id = category_id

      }
    },

    async mounted(){

      if (this.$route.params.slug) {
        await this.getPost();

        this.initPost();
      }

      this.getCategory()

    }
}
</script>
