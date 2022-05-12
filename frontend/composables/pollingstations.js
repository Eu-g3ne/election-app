import axios from 'axios'
import { ref } from 'vue'
import { useToast } from "vue-toastification"

export default function usePollingStations() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
    }
  };
  const URL = 'http://localhost/api/polling_stations'
  const pollingStations = ref([])
  const pollingStation = ref({})
  const toast = useToast()

  const getPollingStations = async (page) => {
    await axios.get(URL + '?page=' + page)
      .then(response => {
        pollingStations.value = response.data;
      })
  }

  const addPollingStation = async () => {
    await axios.post(URL, JSON.stringify(pollingStation.value), options)
      .then(response => {
        toast.success('Виборчу дільницю успішно створено!')
      })
  }

  const showPollingStation = async (id) => {
    await axios.get(URL + '/' + id)
      .then(response => {
        pollingStation.value = response.data
      })
  }

  const updatePollingStation = async () => {
    await axios.put(URL + '/' + pollingStation.value.id, JSON.stringify(pollingStation.value), options)
      .then(response => {
        toast.success('Інформацію успішно відновлено!')
      })
      .catch(e => {
        const errors = e.response.data.errors
        console.log(e)
        toast.error(Object.values(errors).join('\n'))
      })
  }

  const deletePollingStation = async (id) => {
    axios.delete(URL + '/' + id, options)
      .then(response => {
        getPollingStations();
        toast.success('Виборчий округ успішно видалено!')
      })
      .catch(e => {
        console.log(e)
      })
  }

  return { pollingStations, pollingStation, getPollingStations, addPollingStation, showPollingStation, updatePollingStation, deletePollingStation }
}