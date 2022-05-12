import axios from 'axios'
import { ref } from 'vue'
import { useToast } from "vue-toastification"

export default function useCandidates() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
    }
  };
  const URL = 'http://localhost/api/candidates'
  const candidates = ref([])
  const candidate = ref({})
  const contract = ref({})
  const toast = useToast()
  const getCandidates = async (page) => {
    await axios.get(URL + '?page=' + page)
      .then(response => {
        candidates.value = response.data;
      })
  }

  const addCandidate = async () => {
    axios.post(URL, candidate.value, options)
      .then(response => {
        console.log(response.data)
        candidate.value = response.data
        toast.success('Кандидата успішно зареєстровано!')
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const showCandidate = async (candidateId) => {
    axios.get(URL + '/' + candidateId)
      .then(response => {
        candidate.value = response.data
        if (response.data.contract) {
          contract.value = response.data.contract
        }
      })
  }

  const updateCandidate = async () => {
    await axios.put(URL + '/' + candidate.value.id, JSON.stringify(candidate.value), options)
      .then(response => {
        console.log(response.data)
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const deleteCandidate = async (id) => {
    axios.delete(URL + '/' + id, options)
      .then(response => {
        getCandidates();

        toast.success('Виборця успішно видалено!')
      })
      .catch(e => {
        console.log(e)
      })
  }

  return { candidates, candidate, contract, getCandidates, addCandidate, showCandidate, updateCandidate, deleteCandidate }
}