<script setup>
import { onMounted, ref } from 'vue'
import useVoters from '../../composables/voters'
import useConstituencies from '../../composables/constituencies'
import usePollingStations from '../../composables/pollingstations'
import { useToast } from "vue-toastification"


const { voter, registration, showVoter, updateVoter } = useVoters();
const { constituencies, getConstituencies } = useConstituencies();
const { pollingStations, getPollingStations } = usePollingStations();

const loading = ref(true);
const toast = useToast();
const props = defineProps({
  id: { type: Number, required: true },
});
onMounted(async () => {
  await showVoter(props.id)
  await getConstituencies()
  await getPollingStations().then(() => {
    loading.value = false;
  })

})

const sendUpdate = () => {
  voter.registration = registration
  updateVoter()
  toast.success('Інформацію успішно відновлено!')
}

</script>
<template>
    <div class="col-11 mb-5">
        <h2>Виборець</h2>
    </div>
    <div v-show="loading" class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div v-show="!loading">
      <form class="text-start" @submit.prevent="sendUpdate">
        <div class="row">
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
              <select class="form-select" aria-label="Виборча дільниця"
                v-model.number="registration.polling_station_id">
                <option v-for="polSt in pollingStations.pollingStations" :value="polSt.id">{{ polSt.address }}</option>
              </select>
            </div>
          </div>
        </div>
        <button class="btn btn-dark text-nowrap">Оновити дані</button>
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