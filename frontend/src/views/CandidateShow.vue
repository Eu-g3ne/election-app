<script setup>
import { onBeforeMount } from 'vue'
import useCandidates from '../../composables/candidates'
import useParties from '../../composables/parties'
import { useToast } from "vue-toastification"


const { candidate, contract, showCandidate, updateCandidate } = useCandidates();
const { parties, getParties } = useParties();

const toast = useToast();
const props = defineProps({
  id: { type: Number, required: true },
});
onBeforeMount(async () => {
  await getParties()
  await showCandidate(props.id)
})

const sendUpdate = () => {
  candidate.contract = contract
  updateCandidate()
  toast.success('Інформацію успішно відновлено!')
}

</script>
<template>
  <div>
    <div class="row">
      <div class="col-2 d-flex align-items-start mb-4">
        <router-link to="/candidates"><button class="btn btn-dark"><i class="fas fa-circle-chevron-left"></i>
            Назад</button>
        </router-link>
      </div>
      <div class="col-8">
        <h2 class="justify-content-center">Кандидат</h2>
      </div>
    </div>
    <form class="text-start" @submit.prevent="sendUpdate">
      <div class="row">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Прізвище</label>
            <input type="text" class="form-control" v-model="candidate.surname">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Ім'я</label>
            <input type="text" class="form-control " v-model="candidate.name">
          </div>
          <div class="mb-3">
            <label class="form-label">По-батькові</label>
            <input type="text" class="form-control" v-model="candidate.patronymic">
          </div>
          <div class="mb-3">
            <label class="form-label">Дата народження</label>
            <input type="date" class="form-control" v-model="candidate.birthday">
          </div>
          <div class="mb-3">
            <label class="form-label">Освіта</label>
            <input type="text" class="form-control" v-model="candidate.education">
          </div>
          <div class="mb-3">
            <label class="form-label">Паспорт</label>
            <input type="text" class="form-control" v-model="candidate.passport">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="form-label">Діяльність</label>
            <input type="text" class="form-control" v-model="candidate.activity">
          </div>
          <div class="mb-3">
            <label class="form-label">Партія</label>
            <select class="form-select" aria-label="Партія" v-model.number="contract.party_id">
              <option v-for="party in parties.parties" :value="party.id">{{ party.name }}</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Дата вступу</label>
            <input type="text" class="form-control" v-model="contract.entry_date">
          </div>
          <div class="mb-3">
            <label class="form-label">Номер мандату</label>
            <input type="text" class="form-control" v-model="contract.mandate_number">
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
}
</style>