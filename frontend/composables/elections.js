import axios from 'axios'
import {ref} from 'vue'
import { useToast } from "vue-toastification"

export default function useElections() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
  }
};

const URL = 'http://localhost:80/api'
  const elections = ref([])
  const election = ref({})
  const voterId = ref()
  const electionId = ref()
  const candidates = ref([])
  const toast = useToast()

  const getElections = async(page) => {
    await axios.get(URL + '/elections?page='+page)
        .then(response => {
          elections.value = response.data;
        })
  }
  const addElection = async() => {
    await axios.post(URL+'/elections', JSON.stringify(election.value), options)
    .then(response => {
      toast.success('Голосування успішно створене!')
      getElections()
    })
    .catch(e => {
      toast.error('Something went wrong')
      console.log(e)
    })
  }

  const showElection = async(electionId) => {
    await axios.get(URL+'/elections/'+electionId)
    .then(response => {
      election.value = response.data
    })
  }

  const getElectionsByVoter = async (page) => {
    await axios.get(URL+'/voters/'+voterId.value+'/elections?page='+page)
    .then(response => {
      elections.value = response.data
    })
  }

  const getCandidatesByElection = async(page) => {
    await axios.get(URL+'/voters/'+voterId.value+'/elections/'+electionId.value+'/candidates?page='+page)
    .then(response => {
      candidates.value = response.data
    })
  }

  const sendVote = async(id) => {
    await axios.post(URL+'/voters/'+voterId.value+'/elections/'+electionId.value+'/candidates/'+id,options)
    .then(response => {
      toast.success('Голос успішно віддано!')
    })
    .catch(e => {
      console.log(e)
    })
  }

  const deleteVote = async(id) => {
    await axios.delete(URL+'/voters/'+voterId.value+'/elections/'+electionId.value+'/candidates/'+id,options)
    .then(response => {
      toast.success('Голос успішно відмінено!')
    })
    .catch(e => {
      console.log(e)
    })
  }

  const updateElection = async() => {
    await axios.put(URL+'/elections/'+election.value.id, JSON.stringify(election.value), options)
    .then(response => {
      toast.success('Інформацію успішно відновлено!')
    })
    .catch(e => {
      const errors = e.response.data.errors
      console.log(e)
      toast.error(Object.values(errors).join('\n'))
    })
  }

  const deleteElection = async(id) => {
    axios.delete(URL+'/elections/'+id,options)
    .then(response => {
      getElections();
      toast.success('Голосування успішно видалено!')
    })
    .catch(e => {
      console.log(e)
    })
  }

  return { voterId, candidates, electionId, elections, election, getElections, sendVote, deleteVote, getElectionsByVoter, getCandidatesByElection, addElection, showElection, updateElection, deleteElection }
}