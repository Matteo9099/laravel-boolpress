<template>
  <section class="pt-5">
    <div class="container py-4">
      <div class="row">
        <div class="col-6">
          <!-- alert per avvertire che la email è stata inviata con successo -->
          <form @submit.prevent="sendForm">
            <div v-if="success" class="alert alert-success">
              Email inviata con successo!!
            </div>
          <!-- classe dinamica che mostra messaggio di errore se questo campo non è stato compilato -->
            <div class="form-group">
              <label for="name">Inserisci nome</label>
              <input type="text" class="form-control" :class="{ 'is-invalid': errors.name }" id="name" name="name" v-model="name"/>
              <p v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                {{ error }}
              </p>
            </div>

            <div class="form-group">
              <label for="email">Inserisci la tua email</label>
              <input type="email" class="form-control" :class="{ 'is-invalid': errors.email }" id="email" name="email" v-model="email"/>
              <p v-for="(error, index) in errors.email" :key="'error_email' + index" class="invalid-feedback">
                {{ error }}
              </p>
            </div>

            <div class="form-group">
              <label for="message">Motivo del contatto</label>
              <textarea class="form-control" :class="{ 'is-invalid': errors.message }" id="message" rows="6" name="message" v-model="message"></textarea>
              <p v-for="(error, index) in errors.message" :key="'error_message' + index" class="invalid-feedback">
                {{ error }}
              </p>
            </div>
          <!-- nel caricamneto dell'invio viene mostrata la stringa seguente -->
            <button type="submit" class="btn btn-primary mt-3">
              {{ sendingInProgress ? "Invio in corso..." : "Invia" }}
            </button>

          </form>
        </div>
        <div class="col-6 logo">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.518545040851!2d12.47731721528148!3d41.903210279220225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6053f4560eaf%3A0x92dc2249ee91dd51!2sVia%20del%20Corso%2C%2000187%20Roma%20RM!5e0!3m2!1sit!2sit!4v1650391709902!5m2!1sit!2sit" 
            width="500" height="400">
          </iframe>       
           </div>
      </div>

      <div class="row">
        <div class="col">
          <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">Home</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">Features</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">Pricing</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">FAQs</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">About</a>
              </li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
          </footer>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      name: "",
      email: "",
      message: "",
      sendingInProgress: false,
      errors: {},
      success: false,
    };
  },
  methods: {
    sendForm() {
      this.sendingInProgress = true;
      axios
        .post("/api/contacts", {
          name: this.name,
          email: this.email,
          message: this.message,
        })
        .then((res) => {
          this.sendingInProgress = false;

          if (res.data.errors) {
            this.errors = res.data.errors;
            this.success = false;
          } else {
            this.success = true;
            (this.name = ""), (this.email = ""), (this.message = ""), (this.errors = {});
          }
        });
    },
  },
};
</script>

<style lang="scss" scoped>
section {
  background-color: #003;
  color: #fff;

  input, textarea{
    float: right;
    font: normal 13px Arial, Helvetica, sans-serif;
    padding: 6px 24px 6px 6px;
    background-color: #c1caca;
  }

  .logo{
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
</style>
