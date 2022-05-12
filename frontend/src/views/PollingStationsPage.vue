<script setup>
import { onMounted, ref } from 'vue';
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import usePollingStations from '../../composables/pollingstations'
import ReportButton from '../components/ReportButton.vue';

const { pollingStations, pollingStation, getPollingStations, addPollingStation, deletePollingStation } = usePollingStations();
const loading = ref(true);

onMounted(async () => {
  await getPollingStations().then(() => {
    loading.value = false;
  })
})

const sendPollingStation = async () => {
  await addPollingStation()
}

const destroy = async (id) => {
  await deletePollingStation(id)
}

</script>

<template>
  <h2 class="text-lg-center col-11">Виборчі дільниці</h2>

  <div class="row">
    <div class="col d-flex justify-content-start">
      <button class="btn btn-dark text-nowrap" type="button" data-bs-toggle="collapse" data-bs-target="#msclps"
        aria-expanded="false" aria-controls="msclps"><i class="fas fa-user-plus"></i> Створити
        виборчу дільницю</button>
    </div>
    <div class="col d-flex justify-content-end">
      <ReportButton table="polling_stations" />
    </div>
  </div>
  <div class="collaps multi-collapse fs-6 collapse" id="msclps">
    <form class="text-start" @submit.prevent="sendPollingStation">
      <div class="row mt-3">
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
      <button data-bs-toggle="collapse" data-bs-target="#msclps" aria-controls="msclps" class="btn btn-dark text-nowrap"
        type="submit"> <i class="fas fa-circle-plus"></i> Додати </button>
    </form>
  </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <my-table :data="pollingStations" :getData="getPollingStations">
      <table-row v-for="pollingStation in pollingStations.pollingStations" :key="pollingStation.id"
        :record="pollingStation">
        <table-cell class="col-sm-3">
          <router-link :key="pollingStation.id"
            :to="{ name: 'pollingStation.show', params: { id: pollingStation.id } }">
            <button class="btn btn-primary mb-1"><i class="fas fa-eye" />
              Редагувати
            </button>
          </router-link>
          <button class="btn btn-danger" @click="destroy(pollingStation.id)"> <i class="fas fa-trash" />
            Видалити</button>
        </table-cell>
      </table-row>
    </my-table>
  </div>
</template>

<style scoped>
.table-responsive {
  margin-top: 10px !important;
}

.fs-6 {
  font-size: 14px !important;
}

td,
th {
  transition: 0.1s !important;
}


.btn {
  margin-left: 4px !important;
  border-radius: 30px !important;
  border-color: none !important;
  transition: 0.5s;
  font-size: 14px;
}

.btn-dark:hover {
  background-color: #0B57A4;
}
</style>