<script setup>
import { onBeforeMount, ref } from 'vue'
import useElections from '../../composables/elections'

const { election, showElection, updateElection } = useElections();
const loading = ref(true);
const props = defineProps({
  id: { type: Number, required: true },
});
onBeforeMount(() => {
  showElection(props.id).then(() => {
    loading.value = false;
  })
})

const sendUpdate = () => {
  updateElection()
}

</script>
<template>
    <div class="col-11 mb-5">
        <h2>Голосування</h2>
    </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <form class="text-start" @submit.prevent="sendUpdate">
      <div class="row">
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