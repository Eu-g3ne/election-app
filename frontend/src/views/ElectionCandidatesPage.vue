<script setup>
import MyTable from '../components/MyTable.vue';
import TableCell from '../components/TableCell.vue';
import TableRow from '../components/TableRow.vue';
import { onMounted, ref } from 'vue';
import useElections from '../../composables/elections.js'
import axios from 'axios';

const { voterId, electionId, candidates, getCandidatesByElection, sendVote, deleteVote } = useElections()

const props = defineProps({
  voterId: { type: Number, required: true },
  electionId: { type: Number, required: true }
})

const loading = ref(true);

const canVote = ref();

onMounted(async () => {
  voterId.value = props.voterId;
  electionId.value = props.electionId;
  await getCandidatesByElection().then(() => {
    canVote.value = candidates.value.can_vote ? candidates.value.can_vote : false;
    loading.value = false;
  });
})

const makeVote = async (candidate) => {
  canVote.value = candidate.id
  candidate.total_votes++;
  await sendVote(candidate.id)
}

const sendUnvote = async (candidate) => {
  canVote.value = false
  candidate.total_votes--
  await deleteVote(candidate.id);
}

</script>
<template>
  <div class="container-fluid">
    <h1>Кандидати</h1>
    <div v-show="loading" class="spinner-border mt-3" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div v-show="!loading">
      <my-table :data="candidates" :getData="getCandidatesByElection">
        <table-row v-for="candidate in candidates.candidates" :key="candidate.id" :record="candidate">
          <table-cell class="col-2">
            <button @click="makeVote(candidate)" class="btn btn-success mb-1" v-if="canVote == false">
              <i class="fas fa-user-check" />
              Голосувати
            </button>
            <button v-else-if="canVote == candidate.id" @click="sendUnvote(candidate)" class="btn btn-danger mb-1">
              <i class="fas fa-circle-xmark" />
              Відмінити голос
            </button>
          </table-cell>
        </table-row>
      </my-table>
    </div>
  </div>
</template>