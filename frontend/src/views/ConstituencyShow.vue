<script setup>
import { onBeforeMount, ref } from 'vue'
import useConstituencies from '../../composables/constituencies'

const { constituency, showConstituency, updateConstituency } = useConstituencies();
const loading = ref(true);
const props = defineProps({
  id: { type: Number, required: true },
});
onBeforeMount(() => {
  showConstituency(props.id).then(() => {
    loading.value = false;
  })
})

const sendUpdate = () => {
  updateConstituency()
}

</script>
<template>
    <div class="col-11 mb-5">
        <h2>Виборчий округ</h2>
    </div>
  <div v-show="loading" class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  <div v-show="!loading">
    <form class="text-start" @submit.prevent="sendUpdate">
      <div class="row">
        <div class="col">
          <div class="mb-3 ">
            <label class="form-label">Регіон</label>
            <input type="text" class="form-control" v-model="constituency.region">
          </div>
          <div class="mb-3 ">
            <label class="form-label ">Електронна пошта</label>
            <input type="email" class="form-control " v-model="constituency.email">
          </div>
          <div class="mb-3">
            <label class="form-label">Телефон</label>
            <input type="text" class="form-control" v-model="constituency.phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Адреса</label>
            <input type="text" class="form-control" v-model="constituency.address">
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