<script setup>
import { onBeforeMount, ref } from 'vue'
import useParties from '../../composables/parties'

const { party, showParty, updateParty } = useParties();
const loading = ref(true);
const props = defineProps({
  id: { type: Number, required: true },
});
onBeforeMount(() => {
  showParty(props.id).then(() => {
    loading.value = false;
  })
})

const sendUpdate = () => {
  updateParty()
}

</script>
<template>
    <div class="col-11 mb-5">
        <h2>Партія</h2>
    </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <form class="text-start" @submit.prevent="sendUpdate">
      <div class="row">
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
            <label class="form-label">Лідер</label>
            <input type="text" class="form-control" v-model="party.leader">
          </div>
          <div class="mb-3">
            <label class="form-label">Кількість членів</label>
            <input type="number" class="form-control" v-model="party.total_members">
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