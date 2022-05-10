<script setup>

</script>

<template>
  <nav class="navbar sticky-top navbar-expand-xl navbar-dark bg-dark mb-4 text-nowrap">
    <div class="container-fluid">
      <router-link class="navbar-brand ms-2 me-5" to="/">
        <i class="fas fa-check-to-slot"></i>
        Election App
      </router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link" to="/voters">Виборці</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/candidates">Кандидати</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/parties">Партії</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/constituencies">Виборчі округи</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/polling-stations">Виборчі дільниці</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/elections">Голосування</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<style scoped>
.container-fluid {
  min-height: 0% !important;
}
</style>
