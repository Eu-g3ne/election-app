<script setup>

</script>

<template>
  <h3>Веб додаток автоматизована інформаційна система</h3>
  <h4>для роботи територіальної виборчої комісії</h4>
  <div class="row row-cols-1 row-cols-md-3 g-3 mt-4">
    <div class="col mb-4">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Голосування</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-person-booth fa-2xl"></i></h5>
          <p class="card-text mt-3">Голосування - таблиця з переліком голосувань, з можливістю зареєструвати нове,
            редагувати
            або видалити голсування. Також можливо згенерувати звіт</p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/elections" />
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Кандидати</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-address-card fa-2xl"></i></h5>
          <p class="card-text mt-3">Кандидати - таблиця з переліком кандидатів на голосуванні та без нього, з можливістю
            зареєструвати нового, редагувати або видалити кандидата. Також можливо згенерувати звіт</p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/candidates" />
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Виборці</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-user-check fa-2xl"></i></h5>
          <p class="card-text mt-3">Виборці - таблиця з переліком виборців, які приймают участь у голосуваннях, з
            можливістю зареєструвати нового, редагувати або видалити виборця. Також можливо згенерувати звіт
          </p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/voters" />
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Партії</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-people-group fa-2xl"></i></h5>
          <p class="card-text mt-3">Партії - таблиця з переліком партій, в яких перебувають кандидати, з
            можливістю зареєструвати нову, редагувати або видалити партію. Також можливо згенерувати звіт
          </p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/parties" />
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Виборчі округи</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-address-card fa-2xl"></i></h5>
          <p class="card-text mt-3">Виборчі округи - таблиця з переліком округів, до яких приписані виборці, з
            можливістю зареєструвати нову, редагувати або видалити округ. Також можливо згенерувати звіт
          </p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/constituencies" />
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-dark bg-light mb-3 h-100 shadow-lg" style="max-width: 28rem;">
        <div class="card-header fs-4 bg-dark text-white">Виборча дільниця</div>
        <div class="card-body h-100">
          <h5 class="card-title"><i class="fas fa-address-card fa-2xl"></i></h5>
          <p class="card-text mt-3">Виборчі дільниці - таблиця з переліком дільниць, до яких приписані виборці и на яких
            вони голосують, з можливістю зареєструвати нову, редагувати або видалити дільницю. Також можливо згенерувати
            звіт
          </p>
        </div>
        <div class="card-footer bg-light border-0 mb-3">
          <router-link class="stretched-link" to="/polling-stations" />
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  transition: .5s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
}

.card-header {
  transition: .5s;
}

.card:hover>.card-header {

  background-color: #084298 !important;
}
</style>