<script setup>
import { onMounted, ref } from 'vue';
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import useElections from '../../composables/elections'
import ReportButton from '../components/ReportButton.vue';

const { elections, election, getElections, addElection, deleteElection } = useElections();

const loading = ref(true);

onMounted(async () => {
  await getElections().then(() => {
    loading.value = false;
  })
})

const sendElection = async () => {
  await addElection()
}

const destroy = async (id) => {
  await deleteElection(id)
}

</script>

<template>
  <h2 class="text-lg-center col-11">Голосування</h2>
  <div class="row">
    <div class="col d-flex justify-content-start">
      <button class="btn btn-dark text-nowrap" type="button" data-bs-toggle="collapse" data-bs-target="#msclps"
        aria-expanded="false" aria-controls="msclps"><i class="fas fa-user-plus"></i> Створити
        голосування</button>
    </div>
    <div class="col d-flex justify-content-end">
      <ReportButton table="elections" />
    </div>
  </div>
  <div class="collaps multi-collapse fs-6 collapse" id="msclps">
    <form class="text-start" @submit.prevent="sendElection">
      <div class="row mt-3">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Пост</label>
            <input type="text" class="form-control" v-model="election.post">
          </div>
          <div class="mb-3 ">
            <select class="form-select" aria-label="Статус голосування" v-model="election.status">
              <option value="Ongoing">Активне</option>
              <option value="Finished">Неактивне</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Дата початку</label>
            <input type="date" class="form-control" v-model="election.started_at">
          </div>
          <div class="mb-3">
            <label class="form-label">Дата завершення</label>
            <input type="date" class="form-control" v-model="election.finished_at">
          </div>
        </div>
      </div>
      <button data-bs-toggle="collapse" data-bs-target="#msclps" aria-controls="msclps" class="btn btn-dark text-nowrap"
        type="submit"> <i class="fas fa-circle-plus"></i> Додати</button>
    </form>
  </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <my-table :data="elections" :getData="getElections">
      <table-row v-for="election in elections.elections" :key="election.id" :record="election">
        <table-cell class="col-sm-3">
          <router-link :key="election.id" :to="{ name: 'election.show', params: { id: election.id } }">
            <button class="btn btn-primary mb-1"><i class="fas fa-eye" />
              Редагувати
            </button>
          </router-link>
          <button class="btn btn-danger" @click="destroy(election.id)"> <i class="fas fa-trash" />
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