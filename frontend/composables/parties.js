import axios from 'axios'
import { ref } from 'vue'
import { useToast } from "vue-toastification"

export default function useCandidates() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
    }
  };
  const URL = 'http://localhost/api/parties'
  const parties = ref([])
  const party = ref({})
  const toast = useToast()

  const getParties = async (page) => {
    await axios.get(URL + '?page=' + page)
      .then(response => {
        parties.value = response.data;
      })
  }

  const addParty = async () => {
    axios.post(URL, party.value, options)
      .then(response => {
        getParties();
        toast.success('Партію успішно зареєстровано!')
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const showParty = async (id) => {
    await axios.get(URL + '/' + id)
      .then(response => {
        party.value = response.data
      })
  }

  const updateParty = async () => {
    await axios.put(URL + '/' + party.value.id, JSON.stringify(party.value), options)
      .then(response => {
        toast.success('Інформацію успішно відновлено!')
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const deleteParty = async (id) => {
    axios.delete(URL + '/' + id, options)
      .then(response => {
        getParties();
        toast.success('Партію успішно видалено!')
      })
      .catch(e => {
        console.log(e)
      })
  }

  return { parties, party, getParties, addParty, showParty, updateParty, deleteParty }
}