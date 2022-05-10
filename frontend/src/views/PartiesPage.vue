<script setup>
import { onMounted, ref } from 'vue';
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import useParties from '../../composables/parties'
import ReportButton from '../components/ReportButton.vue';

const { parties, party, getParties, addParty, deleteParty } = useParties();
const loading = ref(true);

onMounted(async () => {
  await getParties().then(() => {
    loading.value = false;
  })
})

const sendParty = async () => {
  await addParty()
}

const destroy = async (id) => {
  await deleteParty(id)
}

</script>

<template>
  <h2 class="text-lg-center fw-bold">Партії</h2>

  <div class="row">
    <div class="col d-flex justify-content-start">
      <button class="btn btn-dark text-nowrap" type="button" data-bs-toggle="collapse" data-bs-target="#msclps"
        aria-expanded="false" aria-controls="msclps"><i class="fas fa-user-plus"></i> Створити
        партію</button>
    </div>
    <div class="col d-flex justify-content-end">
      <ReportButton table="parties" />
    </div>
  </div>
  <div class="collaps multi-collapse fs-6 collapse" id="msclps">
    <form class="text-start" @submit.prevent="sendParty">
      <div class="row mt-3">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Назва</label>
            <input type="text" class="form-control" v-model="party.name">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Дата створення</label>
            <input type="date" class="form-control " v-model="party.created_at">
          </div>
          <div class="mb-3">
            <label class="form-label">Лідер партії</label>
            <input type="text" class="form-control" v-model="party.leader">
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
    <my-table :data="parties" :getData="getParties">
      <table-row v-for="party in parties.parties" :key="party.id" :record="party">
        <table-cell class="col-sm-3">
          <router-link :key="party.id" :to="{ name: 'party.show', params: { id: party.id } }"><button
              class="btn btn-primary mb-1"><i class="fas fa-eye" />
              Редагувати
            </button>
          </router-link>
          <button class="btn btn-danger" @click="destroy(party.id)"> <i class="fas fa-trash" /> Видалити</button>
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