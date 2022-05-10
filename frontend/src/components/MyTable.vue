<script setup>
import TableHead from './TableHead.vue';
import TableColumn from './TableColumn.vue';
import { ref, watch } from 'vue';
import tables from '../assets/tables.json'
const props = defineProps({
  data: Object,
  getData: Function,
})

const titles = ref([])

watch(() => props.data,
  (data, prevData) => {
    let flag = false;
    try {
      if (Object.keys(data.candidates[0])[8] === 'total_votes') {
        flag = true;
      }
    } catch (e) {

    }
    if (flag) {
      titles.value = tables['electionCandidates']
    } else {
      titles.value = tables[Object.keys(data)[0]];
    }
  })

</script>

<template>
  <div class="table-responsive-xxl mt-2">
    <table class="table table-hover table-bordered table-sm align-middle">
      <table-head>
        <table-column v-for="title in titles" :title="title" />
        <table-column title="Actions" />
      </table-head>
      <tbody>
        <slot />
      </tbody>
    </table>
    <Pagination :data="data" size="small" @pagination-change-page="getData" align="left" class="mt-4">
      <template #prev-nav>
        <span><i class="fas fa-circle-chevron-left"></i> Previous</span>
      </template>
      <template #next-nav>
        <span>Next <i class="fas fa-circle-chevron-right"></i></span>
      </template>
    </Pagination>
  </div>
</template>

<style scoped>
</style>