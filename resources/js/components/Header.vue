<template>
  <div>
    <nav class="navbar navbar-expand bg-primary bg-gradient">
        <a class="navbar-brand text-white" href="#">Boolpress</a>

        <ul class="navbar-nav m-auto">
            <li class="nav-item" v-for="menuItem in menuItems" :key="menuItem.routeName">
                <router-link class="nav-link text-white":to="{name: menuItem.routeName}">{{menuItem.label}}</router-link>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin">Accesso admin</a>
            </li>
        </ul>
       
    </nav>
  </div>
</template>

<script>
export default {
  name: "Header",
  data() {
      return {
          menuItems: [
              {
                  routeName: "home",
                  label: "Home",
              },
              {
                  routeName: "about",
                  label: "Chi siamo",
              },
              {
                  routeName: "contact",
                  label: "Contatti",
              },
              {
                  routeName: "blog",
                  label: "blog",
              }
          ]
      }
  }
};
</script>

<style>
    
    .router-link-exact-active{
        font-weight: bold;
        border-bottom: 2px solid #fff;
    }

</style>
