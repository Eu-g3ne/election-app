<script setup>
import { onMounted, reactive, ref } from 'vue';
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import useCandidates from '../../composables/candidates.js'
import useParties from '../../composables/parties'
import ReportButton from '../components/ReportButton.vue';

const { candidates, candidate, contract, getCandidates, addCandidate, deleteCandidate } = useCandidates()
const { parties, getParties } = useParties();
const loading = ref(true);
onMounted(async () => {
  await getCandidates()
  await getParties().then(() => {
    loading.value = false;
  })
})


const sendCandidate = () => {
  if (contract.value.party_id) {
    candidate.value.contract = contract
  }
  addCandidate()
}

const destroy = async (id) => {
  await deleteCandidate(id)
}



</script>

<template>
  <h2 class="text-lg-center fw-bold">Кандидати</h2>
  <div class="row">
    <div class="col d-flex justify-content-start">
      <button @click="formOpen" class="btn btn-dark text-nowrap" type="button" data-bs-toggle="collapse"
        data-bs-target="#msclps" aria-expanded="false" aria-controls="msclps"><i class="fas fa-user-plus"></i> Створити
        кандидата</button>
    </div>
    <div class="col d-flex justify-content-end">
      <ReportButton table="candidates" />
    </div>
  </div>
  <div class="collaps multi-collapse fs-6 collapse" id="msclps">
    <form class="text-start" @submit.prevent="sendCandidate">
      <div class="row mt-3">
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
            <select class="form-select" aria-label="Виборчий округ" v-model.number="contract.party_id">
              <option class="fw-bold" :value="null">Без партії</option>
              <option v-for="party in parties.parties" :value="party.id">{{ party.name }}</option>
            </select>
          </div>
          <div class="mb-3" v-if="contract.party_id">
            <div class="mb-3">
              <label class="form-label">Дата вступу у партію</label>
              <input type="date" class="form-control" v-model="contract.entry_date">
            </div>
            <div class="mb-3">
              <label class="form-label">Номер мандату</label>
              <input type="text" class="form-control" v-model="contract.mandate_number">
            </div>
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
    <my-table :data="candidates" :getData="getCandidates">
      <table-row v-for="candidate in candidates.candidates" :key="candidate.id" :record="candidate">
        <table-cell class="col-sm-3">
          <router-link :key="candidate.id" :to="{ name: 'candidate.show', params: { id: candidate.id } }"><button
              class="btn btn-primary mb-1"><i class="fas fa-eye" />
              Редагувати
            </button>
          </router-link>
          <button class="btn btn-danger" @click="destroy(candidate.id)"> <i class="fas fa-trash" /> Видалити</button>
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