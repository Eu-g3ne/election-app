<script setup>
import { onBeforeMount, ref } from 'vue'
import usePollingStations from '../../composables/pollingstations'

const { pollingStation, showPollingStation, updatePollingStation } = usePollingStations();
const loading = ref(true);
const props = defineProps({
  id: { type: Number, required: true },
});
onBeforeMount(() => {
  showPollingStation(props.id).then(() => {
    loading.value = false;
  })
})

const sendUpdate = () => {
  updatePollingStation()
}

</script>
<template>
  <div class="row justify-content-start ">
    <div class="col-2 d-flex align-self-start">
      <router-link to="/polling-stations"><button class="btn btn-dark"><i class="fas fa-circle-chevron-left"></i>
          Назад</button>
      </router-link>
    </div>
    <div class="col-9">
      <h2 class="justify-content-center">Виборча дільниця</h2>
    </div>
  </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <form class="text-start" @submit.prevent="sendUpdate">
      <div class="row">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Адреса</label>
            <input type="text" class="form-control" v-model="pollingStation.address">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Місто</label>
            <input type="text" class="form-control " v-model="pollingStation.city">
          </div>
          <div class="mb-3">
            <label class="form-label">Телефон</label>
            <input type="text" class="form-control" v-model="pollingStation.phone">
          </div>
        </div>
      </div>
      <button class="btn btn-dark text-nowrap"><i class="fas fa-floppy-disk" /> Оновити дані</button>
    </form>
  </div>
</template>
<style scoped>
input,
select,
button {
  font-size: 20px;
  margin-bottom: 20px !important;
}
</style>