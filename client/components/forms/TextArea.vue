<template>
  <div id="input" class="flex flex-col w-full my-2">
    <label :for="id" class="text-gray-500 mb-2">{{ label}}</label>
    <textarea
      rows="5"
      :id="id"
      v-bind="$attrs"
      :value="value"
      @input="$emit('update', $event.target.value)"
      :class="error ? 'border-red-600' : ''"
      class="appearance-none border-2 border-gray-100 rounded-lg placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg"
    ></textarea>
    <span v-if="error" class="text-left text-red-600 font-medium py-2">{{ error }}</span>
  </div>
</template>

<script>
export default {
  name: 'TextArea',
  props: ['value', 'label', 'id', 'error'],
  model: {
    prop: 'value',
    event: 'update',
  },
}
</script>
