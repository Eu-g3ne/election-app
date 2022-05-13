<script setup>
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import { onMounted, ref } from 'vue';
import useElections from '../../composables/elections.js'


const { voterId, elections, getElections } = useElections()

const props = defineProps({
  id: { type: Number, required: true }
})
const loading = ref(true);
onMounted(() => {
  voterId.value = props.id;
  getElections().then(() => {
    loading.value = false;
  })
})



</script>
<template>
    <h1 class="col-11 text-lg-center mb-5">Голосування</h1>
    <div v-show="loading" class="spinner-border mt-3" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div v-show="!loading">
      <my-table :data="elections" :getData="getElectionsByVoter">
        <table-row v-for="election in elections.elections" :key="election.id" :record="election">
          <table-cell class="col-2">
            <router-link :to="{ name: 'electionCandidates', params: { voterId: props.id, electionId: election.id } }">
              <button class="btn btn-primary mb-1"><i class="fas fa-eye" /> Кандидати</button>
            </router-link>
          </table-cell>
        </table-row>
      </my-table>
    </div>
</template>