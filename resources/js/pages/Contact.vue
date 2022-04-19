<template>
<div class="container">
    <div class="row">
        <div class="col-12">
    
            <form @submit.prevent="sendForm">

                <div class="form-group">
                    <label for="name">Il tuo nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="name">
                </div>

                <div class="form-group">
                    <label for="email">La tua email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="email">
                </div>

                <div class="form-group">
                    <label for="message">Motivo del contatto:</label>
                    <textarea class="form-control" id="message" name="message" v-model="message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>

            </form>
        </div>
    </div>
</div>
</template>

<script>
   export default {
       name: 'Contact',
       data() {
           return {
               name: '',
               email: '',
               message: ''
           }
       },
       methods: {
           sendForm() {
               axios.post('/api/contacts', {
                   'name': this.name,
                   'email': this.email,
                   'message': this.message,
               }).then(res => {
                   console.log(res);
               });
           }
       },
   }
</script>

<style>
    
</style>