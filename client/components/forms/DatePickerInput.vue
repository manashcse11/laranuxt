<template>
  <div id="input" class="flex flex-col w-full my-5">
    <label :for="id" class="text-gray-500 mb-2">{{ label}}</label>
    <slot></slot>
    <span v-if="error" class="text-left text-red-600 font-medium py-2">{{ error }}</span>
  </div>
</template>

<script>
export default {
  name: 'DatePickerInput',
  props: ['label', 'id', 'error'],
  model: {
    prop: 'value',
    event: 'update',
  },
}
</script>
