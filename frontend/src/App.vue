<script setup>
import NavBar from './components/NavBar.vue'
</script>

<template>
  <NavBar />
  <div class="container-fluid">
    <div v-show="$route.name != 'Home'" class="float-start">
      <button class="btn btn-dark btn-floating" type="button" @click="$router.back()"><i class="fas fa-backward"></i>
        Назад</button>
    </div>
    <router-view>
    </router-view>
  </div>
  <footer class=" bg-dark d-flex flex-wrap justify-content-start align-items-center py-3 mt-5 border-top">
    <p class="col-sm-5 mb-0 text-muted">© 2022 Eug3ne, DDMA</p>

    <p class="col-sm-5 mb-0 text-muted">Stack: Vue3 + Laravel + Docker</p>
  </footer>
</template>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Montserrat+Alternates:wght@300;400&display=swap');

#app {
  font-family: 'Montserrat', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.nav-item {
  padding-left: 10px !important;
  padding-right: 10px !important;
  margin-right: 10px !important;
  margin-left: 5px !important;
  border-radius: 50px;
  transition: 0.7s;
}

.nav-item:hover {
  background-color: #0B57A4;
}

.table-responsive {
  margin-top: 10px !important;
}

.fs-6 {
  font-size: 16px !important;
}

td,
th {
  transition: 0.1s !important;
}

.container-fluid {
  width: 97% !important;
  min-height: 74.4vh !important;
}

.btn {
  margin-left: 4px !important;
  border-radius: 30px !important;
  border-color: none !important;
  transition: 0.5s;

}

.btn-dark:hover {
  background-color: #0B57A4;
}
</style>
