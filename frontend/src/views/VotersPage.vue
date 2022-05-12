<script setup>
import { onMounted, ref } from 'vue';
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import useVoters from '../../composables/voters.js'
import useConstituencies from '../../composables/constituencies'
import usePollingStations from '../../composables/pollingstations'
import ReportButton from '../components/ReportButton.vue';


const { voters, voter, registration, getVoters, addVoter, deleteVoter } = useVoters()
const { constituencies, getConstituencies } = useConstituencies();
const { pollingStations, getPollingStations } = usePollingStations();

const loading = ref(true);

onMounted(async () => await getVoters().then(() => {
  loading.value = false;
}))


const formOpen = () => {
  getConstituencies()
  getPollingStations()
}


const sendVoter = () => {
  voter.value.registration = registration
  console.log(voter)
  addVoter()
}

const destroy = async (id) => {
  await deleteVoter(id)
}

</script>

<template>
  <h2 class="text-lg-center col-11">Виборці</h2>
  <div class="row">
    <div class="col d-flex justify-content-start">
      <button @click="formOpen" class="btn btn-dark text-nowrap" type="button" data-bs-toggle="collapse"
        data-bs-target="#msclps" aria-expanded="false" aria-controls="msclps"><i class="fas fa-user-plus"></i> Створити
        виборця</button>
    </div>
    <div class="col d-flex justify-content-end">
      <ReportButton table="voters" />
    </div>
  </div>
  <div class="collapse multi-collapse fs-6" id="msclps">
    <form class="text-start" @submit.prevent="sendVoter">
      <div class="row mt-3">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Прізвище</label>
            <input type="text" class="form-control" v-model="voter.surname">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Ім'я</label>
            <input type="text" class="form-control " v-model="voter.name">
          </div>
          <div class="mb-3">
            <label class="form-label">По-батькові</label>
            <input type="text" class="form-control" v-model="voter.patronymic">
          </div>
          <div class="mb-3">
            <label class="form-label">Дата народження</label>
            <input type="date" class="form-control" v-model="voter.birthday">
          </div>
          <div class="mb-3">
            <label class="form-label">Місце народження</label>
            <input type="text" class="form-control" v-model="voter.birthplace">
          </div>
          <div class="mb-3">
            <label class="form-label">ІНН</label>
            <input type="text" class="form-control" v-model="voter.inn">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="form-label">Паспорт</label>
            <input type="text" class="form-control" v-model="voter.passport">
          </div>
          <div class="mb-3">
            <label class="form-label">Країна прописки</label>
            <input type="text" class="form-control" v-model="registration.country">
          </div>
          <div class="mb-3">
            <label class="form-label">Місто прописки</label>
            <input type="text" class="form-control" v-model="registration.city">
          </div>
          <div class="mb-3">
            <label class="form-label">Адреса прописки</label>
            <input type="text" class="form-control" v-model="registration.address">
          </div>
          <div class="mb-3">
            <label class="form-label">Виборчий округ</label>
            <select class="form-select" aria-label="Виборчий округ" v-model.number="registration.constituency_id">
              <option v-for="con in constituencies.constituencies" :value="con.id">{{ con.region }}</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Виборча дільниця</label>
            <select class="form-select" aria-label="Виборча дільниця" v-model.number="registration.polling_station_id">
              <option v-for="polSt in pollingStations.pollingStations" :value="polSt.id">{{ polSt.address }}
              </option>
            </select>
          </div>
        </div>
      </div>
      <button class="btn btn-dark text-nowrap" type="submit"> <i class="fas fa-circle-plus"></i> Додати</button>
    </form>
  </div>
  <div v-show="loading" class="spinner-border mt-3" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <my-table :data="voters" :getData="getVoters">
      <table-row v-for="voter in voters.voters" :key="voter.id" :record="voter">
        <table-cell class="col-sm-3">
          <router-link :key="voter.id" :to="{ name: 'voters.show', params: { id: voter.id } }"><button
              class="btn btn-primary mb-1"><i class="fas fa-eye" />
              Редагувати
            </button>
          </router-link>
          <router-link :key="voter.id" :to="{ name: 'electionsByVoter', params: { id: voter.id } }">
            <button class="btn btn-success mb-1 "><i class="fas fa-circle-chevron-right" /> До виборів</button>
          </router-link>
          <button class="btn btn-danger" @click="destroy(voter.id)"> <i class="fas fa-trash" /> Видалити</button>
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