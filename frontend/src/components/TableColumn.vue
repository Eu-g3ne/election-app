<script setup>
const props = defineProps({
  title: String,
})
</script>

<template>
  <th scope="col">{{ title || '#' }}</th>
</template>