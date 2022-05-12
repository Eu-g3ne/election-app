import axios from 'axios'
import { ref } from 'vue'
import { useToast } from "vue-toastification"

export default function useVoters() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*',
    }
  };
  const URL = 'http://localhost/api/voters'
  const voters = ref([])
  const voter = ref({})
  const registration = ref({})
  const toast = useToast()

  const getVoters = async (page) => {
    await axios.get(URL + '?page=' + page)
      .then(response => {
        voters.value = response.data;
      })
  }

  const addVoter = async () => {
    await axios.post(URL, voter.value, options)
      .then(response => {
        console.log(response.data)
        voter.value = response.data
        toast.success('Виборця успішно зареєстровано!')
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const showVoter = async (voterId) => {
    await axios.get(URL + '/' + voterId)
      .then(response => {
        voter.value = response.data
        if (response.data.registration) {
          registration.value = response.data.registration
        }
      })
  }

  const updateVoter = async () => {
    await axios.put(URL + '/' + voter.value.id, JSON.stringify(voter.value), options)
      .then(response => {
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const deleteVoter = async (id) => {
    await axios.delete(URL + '/' + id, options)
      .then(response => {
        getVoters();

        toast.success('Виборця успішно видалено!')
      })
      .catch(e => {
        console.log(e)
      })
  }

  return { voters, voter, registration, getVoters, addVoter, showVoter, updateVoter, deleteVoter }
}