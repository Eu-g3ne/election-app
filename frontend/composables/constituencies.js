import axios from 'axios'
import { ref } from 'vue'
import { useToast } from "vue-toastification"

export default function useConstituencies() {
  const options = {
    headers: {
      'Content-Type': 'application/json',
  }
};
  const URL = 'http://localhost:80/api/constituencies'
  const constituencies = ref([])
  const constituency= ref({})
  const toast = useToast()

  const getConstituencies = async(page) => {
    await axios.get(URL + '?page='+page)
        .then(response => {
          constituencies.value = response.data;
        })
  }

  const addConstituency = async() => {
    await axios.post(URL, JSON.stringify(constituency.value), options)
    .then(response => {
      toast.success('Виборчий округ успішно створено!')
    })
  }

  const showConstituency = async(id) => {
    await axios.get(URL+'/'+id)
    .then(response => {
      constituency.value = response.data
    })
  }

  const updateConstituency = async() => {
    await axios.put(URL+'/'+constituency.value.id, JSON.stringify(constituency.value), options)
    .then(response => {
      toast.success('Інформацію успішно відновлено!')
    })
    .catch(e => {
      const errors = e.response.data.errors
      console.log(e)
      toast.error(Object.values(errors).join('\n'))
    })
  }

  const deleteConstituency = async(id) => {
    axios.delete(URL+'/'+id,options)
    .then(response => {
      getConstituencies();
      toast.success('Виборчий округ успішно видалено!')
    })
    .catch(e => {
      console.log(e)
    })
  }

  return { constituencies, constituency, getConstituencies, addConstituency, showConstituency, updateConstituency, deleteConstituency }
}