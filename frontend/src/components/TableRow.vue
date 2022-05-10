<script setup>
import { computed } from 'vue';
import TableCell from './TableCell.vue'
const props = defineProps({
  record: Object,
})

const columns = computed(() => {
  return Object.getOwnPropertyNames(props.record);
})

</script>

<template>
  <tr>
    <table-cell v-for="cols in columns">
      {{ record[cols] }}
    </table-cell>
    <slot />
  </tr>
</template>