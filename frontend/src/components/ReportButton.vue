<script setup>
import axios from 'axios'
import { useToast } from "vue-toastification"

const props = defineProps({
  table: { type: String, required: true }
})

const URL = 'http://localhost:80/api/reports/'
const toast = useToast();

const getReport = () => {
  axios.get(URL + props.table, { responseType: 'blob' })
    .then(res => {
      const FILE = window.URL.createObjectURL(new Blob([res.data]));
      const docUrl = document.createElement('a');
      docUrl.href = FILE;
      docUrl.setAttribute('download', props.table + '-report.xlsx');
      document.body.appendChild(docUrl);
      docUrl.click();
      toast.success('Звіт згенеровано')

    })
}
</script>

<template>
  <button @click="getReport" class="btn btn-dark" type="button"><i class="fa-solid fa-file-spreadsheet"></i>
    Згенерувати звіт
  </button>
</template>

<style scoped>
</style>